<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Table;
use Carbon\Carbon;

class BookingController extends Controller
{
    //==================Show All Reservations=======================//
    public function booking() {
        $booking = Booking::with('table')->orderByDesc('id')->get();
        $count = 1;
        return view('admin.home.booking.list_booking', compact('booking','count'));
    }
    //==================End Method=======================//
     //==================Show Booking form=======================//
    public function create_booking() {
        $table = Table::where('status','Available')->get();
        return view('admin.home.booking.create_booking', compact('table'));
    }
     //==================Store Create Booking =======================//
    public function create_bookingPost(Request $request)
    {
        $data['name'] = $request->booking_name;
        $data['email'] = $request->booking_email;
        $data['phone'] = $request->booking_phone;
        $data['guest'] = $request->booking_guest;
        $table = Table::where('name', $request->booking_table)->firstOrFail();
        $data['table_id'] = $table->id;
        $data['date'] = $request->booking_date;
        $data['time'] = $request->booking_time;
        $data['message'] = $request->booking_message;
        if ($request->booking_guest > $table->guest) {
            return back()->with('error', 'Please choose a table based on the number of guests.');
        }
        $requestDate = Carbon::parse($request->booking_date)->format('Y-m-d');
        $existingBooking = Booking::where('table_id', $table->id)
            ->where('date', $requestDate)
            ->where('time', $request->booking_time)
            ->first();
        if ($existingBooking) {
            return back()->with('error', 'This table is already booked for the selected date and time.');
        }
        Booking::create($data);
        return redirect()->back()->with("success", "Booking created successfully!");
    }

    //==================Show Update Booking Form=======================//
    public function update_booking($id)
    {
        $booking = Booking::where('id',$id)->first();
        
        $table = Table::where('status','Available')->get();
        return view('admin.home.booking.update_booking',compact('booking','table'));
    }

    //==================Store Update Booking =======================//

    public function update_bookingPost(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->name = $request->booking_name;
        $booking->email = $request->booking_email;
        $booking->phone = $request->booking_phone;
        $booking->guest = $request->booking_guest;
        $table = Table::where('name', $request->booking_table)->firstOrFail();
        $booking->table_id = $table->id; 
        $booking->date = $request->booking_date;
        $booking->time = $request->booking_time;
        $booking->message = $request->booking_message;
        $booking->save();
        return redirect()->back()->with("success", "Updated Booking successfully!");
    }
    //==================Delete Booking=======================//
    public function delete_booking($id_booking)
    {
        $delete = Booking::where('id', $id_booking)->first();
        $delete->delete();
        return redirect('/admin/booking')
        ->with("success","Booking deleted successfully!");
    }

}

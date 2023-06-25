<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Table;



class BookingController extends Controller
{
    //==================Show All Reservations=======================//
    public function booking() {
        //$booking = Booking::all();
        $booking = Booking::orderByDesc('id')->get();
        $count = 1;
        return view('admin.home.reservation', compact('booking','count'));
    }

    //==================End Method=======================//

    //==================Store Create Booking=======================//
    public function create_booking(Request $request)
    {
        // Validate and store the booking

        // Check if the table has the desired number of available seats
        $table = Table::findOrFail($request->table_id);
        if ($table->guest == $request->guest) {
            $table->status = 'Disable';
            $table->save();
        }

        // Redirect or perform other actions
    }

    //==================Store Update Booking=======================//
    public function update_booking(Request $request, $id)
    {
        // Validate and update the booking

        // Get the original booking data
        $originalBooking = Booking::findOrFail($id);

        // Check if the table has the desired number of available seats
        $table = Table::findOrFail($originalBooking->table_id);

        // If the number of guests is changing
        if ($table->guest != $request->guest) {
            // Check if the new number of guests matches any other bookings
            $existingBooking = Booking::where('table_id', $originalBooking->table_id)
                ->where('guest', $request->guest)
                ->first();

            if (!$existingBooking) {
                // No other bookings with the new number of guests, update the table status
                $table->status = 'Available';
                $table->save();
            }
        }

        // Redirect or perform other actions
    }

}

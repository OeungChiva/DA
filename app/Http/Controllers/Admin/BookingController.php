<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;


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
}

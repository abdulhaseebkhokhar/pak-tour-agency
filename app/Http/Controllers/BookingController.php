<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function showBookingForm()
    {
        $tours = Tour::all();
        dd($tours); // Dump and die to inspect the value of $tours
        return view('booking', compact('tours'));
    }
    
    public function storeBooking(Request $request)
    {
        // Validate the booking form data
        $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'booking_date' => 'required|date',
            'number_of_people' => 'required|integer|min:1',
            'special_requests' => 'nullable|string',
        ]);

        // Create a new booking record
        Booking::create([
            'user_id' => auth()->user()->id,  // Assuming user is logged in
            'tour_id' => $request->tour_id,
            'booking_date' => $request->booking_date,
            'number_of_people' => $request->number_of_people,
            'special_requests' => $request->special_requests,
        ]);

        // Redirect to a success page or show a message
        return redirect()->route('booking.success');
    }

    public function bookingSuccess()
    {
        return view('booking.success');  // Show success page
    }
}

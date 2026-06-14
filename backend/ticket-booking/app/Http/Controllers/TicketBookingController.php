<?php

namespace App\Http\Controllers;

use App\Events\MyCustomNotification;

class TicketBookingController extends Controller
{
    public function bookTicket()
    {
        // Here the event is triggered after the ticket booking is successful
        event(new MyCustomNotification('A ticket was booked for you'));
        return response()->json([
            'status' => 'Success',
            'message' => 'Ticket booking event triggered successfully!'
        ]);
    }
}
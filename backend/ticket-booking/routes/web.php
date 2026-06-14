<?php

use App\Http\Controllers\TicketBookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Request endpoint
Route::get('ticket-booking', [TicketBookingController::class, 'bookTicket'])->name('ticket.booking');
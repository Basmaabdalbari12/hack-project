<?php

namespace App\Http\Controllers\Admin;

use App\Queue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Booking;

class HomeController extends Controller
{
   public function index()
   {
      $bookings = Booking::all();
      return view('admin.queue.index', compact('bookings'));
   }

   public function create()
   {  
   	  return view('admin.queue.create');
   }

   public function storeBooking()
   {
      // save user
      $user = User::create([
         'name' => request('name')
      ]);

      $user->bookings()->create([
         'counter' => request('booking_number'),
         'service_id' => request('service_id'),         
      ]);

      return redirect('/index_booking');
   }

   public function updateStatus($id)
   {   
      $booking = Booking::query()->where('id', $id)->firstOrFail();

      $booking->update([
         'status' => ! $booking->status
      ]);

      return redirect()->back();
   }

   public function deleteBooking($id)
   {   
      $booking = Booking::query()->where('id', $id)->delete();

      return redirect()->back();
   }

   public function usedBooking($id)
   {   
      $booking = Booking::query()->where('id', $id)->firstOrFail();

      $booking->update([
         'used' => 1
      ]);

      return redirect()->back();
   }

}

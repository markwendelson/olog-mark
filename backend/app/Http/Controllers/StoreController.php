<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function status()
    {
        $store = Store::first();
        $now = Carbon::now();
        $openingHours = $store->opening_hours;

        $isOpen = $openingHours->isOpenAt($now);
        $nextOpening = $openingHours->nextOpen($now);

        return response()->json([
            'status' => $isOpen ? 'open' : 'closed',
            'next_opening' => $nextOpening ? $nextOpening->format('Y-m-d H:i:s') : null,
        ]);
    }


    public function checkAvailability(Request $request)
    {
        $request->validate([
            'date' => 'required|date_format:Y-m-d',
        ]);

        $store = Store::first();
        $openingHours = $store->opening_hours;

        if (!$openingHours instanceof \Spatie\OpeningHours\OpeningHours) {
            return response()->json(['error' => 'Invalid opening hours format'], 500);
        }

        // Convert the input date to a Carbon instance
        $date = Carbon::parse($request->date);
        $dayName = strtolower($date->format('l')); // Convert to lowercase: "monday", "tuesday", etc.

        // Check if the store is open on that day
        $isOpen = $openingHours->isOpenOn($dayName);

        // Get next opening time if closed
        $nextOpening = !$isOpen ? $openingHours->nextOpen($date) : null;

        return response()->json([
            'is_open' => $isOpen,
            'next_opening' => $nextOpening ? $nextOpening->format('Y-m-d H:i:s') : null,
        ]);
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscribeController extends Controller
{
    public function index()
    {
        return view ('subscribe');
    }
    
    public function subscribe(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email|min:10',
        ]);

        // Save data to database
        Subscription::create([
            'email' => $request->email,
            'ip' => $request->ip(),
            'created_at' => now(),
        ]);

        // Return success response
        return response()->json(['message' => 'Subscription successful!']);
    }
}

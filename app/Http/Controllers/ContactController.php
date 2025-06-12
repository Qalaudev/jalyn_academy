<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'description' => 'required|string|max:100',
        ]);
        AdminNotification::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'description' => $validated['description'],
        ]);

        return back()->with('success', 'Хабарлама сәтті жіберілді!');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Mail\ProductContactMail;

class ProductContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'product_name' => 'required',
            'product_description' => 'required',
            'product_image' => 'required',
        ]);

        // Check IP address submission limit
        $ip = $request->ip();
        $count = DB::table('product_contact_submissions')
            ->where('ip_address', $ip)
            ->where('created_at', '>', Carbon::now()->subDay())
            ->count();

        if ($count >= 3) {
            return back()->withErrors(['You have reached the submission limit for today.']);
        }

        // Store submission record
        DB::table('product_contact_submissions')->insert([
            'ip_address' => $ip,
            'created_at' => now(),
        ]);

        // Send email to admin with product details
        Mail::to('support@biostark-ai.com')->send(new ProductContactMail(
            $request->name,
            $request->email,
            $request->message,
            $request->product_name,
            $request->product_description,
            $request->product_image
        ));

        // Send confirmation email to the user with product details
        Mail::to($request->email)->send(new ProductContactMail(
            $request->name,
            $request->email,
            $request->message,
            $request->product_name,
            $request->product_description,
            $request->product_image,
            true
        ));

        // Redirect back with success message
        return back()->with('success', 'Message sent successfully!');
    }
}

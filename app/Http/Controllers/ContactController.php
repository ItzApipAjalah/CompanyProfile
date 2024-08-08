<?php
// app/Http/Controllers/ContactController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $ip = $request->ip();
        $count = DB::table('contact_submissions')
            ->where('ip_address', $ip)
            ->where('created_at', '>', Carbon::now()->subDay())
            ->count();

        if ($count >= 3) {
            return back()->withErrors(['You have reached the submission limit for today.']);
        }

        DB::table('contact_submissions')->insert([
            'ip_address' => $ip,
            'created_at' => now(),
        ]);

        Mail::to('afif@amwp.website')->send(new ContactFormMail($request->name, $request->email, $request->message));

        return back()->with('success', 'Message sent successfully!');
    }
}

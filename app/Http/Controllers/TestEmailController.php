<?php

// app/Http/Controllers/TestEmailController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestEmailController extends Controller
{
    public function sendTestEmail()
    {
        $toEmail = 'support@biostark-ai.com';  // Replace this with your actual email address

        try {
            Mail::raw('This is a test email.', function ($message) use ($toEmail) {
                $message->to($toEmail)
                    ->subject('Test Email from Laravel');
            });

            return 'Test email sent successfully!';
        } catch (\Exception $e) {
            return 'Failed to send test email. Error: ' . $e->getMessage();
        }
    }
}

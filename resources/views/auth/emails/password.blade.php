<!-- resources/views/auth/emails/password.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body>
    <h1>Password Reset Request</h1>
    <p>You are receiving this email because we received a password reset request for your account.</p>
    <p>Click the button below to reset your password:</p>
    <a href="{{ $resetLink }}" style="display: inline-block; padding: 10px 20px; font-size: 16px; color: white; background-color: #4CAF50; text-align: center; text-decoration: none; border-radius: 5px;">Reset Password</a>
    <p>If you did not request a password reset, no further action is required.</p>
    <p>Thank you,<br>Your Company</p>
</body>
</html>

<!-- resources/views/emails/contact_form.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            color: #333;
            border-bottom: 2px solid #007BFF;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
            margin: 10px 0;
        }
        .label {
            font-weight: bold;
            color: #333;
        }
        .content {
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact Form Submission</h1>
        <p><span class="label">Name:</span> <span class="content">{{ $name }}</span></p>
        <p><span class="label">Email:</span> <span class="content">{{ $email }}</span></p>
        <p><span class="label">Message:</span></p>
        <div class="content">{{ $messageContent }}</div>
    </div>
</body>
</html>

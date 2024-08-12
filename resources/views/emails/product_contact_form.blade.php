<!-- resources/views/emails/product_contact_form.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Product Contact Form Submission</title>
</head>
<body>
    <h1>Product Contact Form Submission</h1>
    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Message:</strong> {{ $messageContent }}</p>
    <hr>
    <h2>Product Details</h2>
    <p><strong>Product Name:</strong> {{ $productName }}</p>
    <p><strong>Description:</strong> {!! $productDescription !!}</p>
    <p><img src="{{ $productImage }}" alt="{{ $productName }}" style="max-width: 100%; height: auto;"></p>
</body>
</html>

<!-- resources/views/emails/user_product_contact_confirmation.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Thank You for Contacting Us</title>
</head>
<body>
    <h1>Thank You for Contacting Us, {{ $name }}</h1>
    <p>We have received your message and will get back to you shortly.</p>
    <p><strong>Your Message:</strong></p>
    <div>{{ $messageContent }}</div>
    <hr>
    <h2>Product Details</h2>
    <p><strong>Product Name:</strong> {{ $productName }}</p>
    <p><strong>Description:</strong> {!! $productDescription !!}</p>
    <p><img src="{{ $productImage }}" alt="{{ $productName }}" style="max-width: 100%; height: auto;"></p>
</body>
</html>

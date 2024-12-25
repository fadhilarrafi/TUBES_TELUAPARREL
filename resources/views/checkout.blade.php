<!-- resources/views/checkout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>

    <!-- Form untuk checkout, pastikan action mengarah ke route checkout.submit -->
    <form method="POST" action="{{ route('checkout.submit', $product->id) }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <!-- Email -->
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <!-- Address -->
        <div>
            <label for="address">Address:</label>
            <textarea name="address" id="address" required></textarea>
        </div>

        <!-- Credit Card Number -->
        <div>
            <label for="credit_card_number">Credit Card Number:</label>
            <input type="text" name="credit_card_number" id="credit_card_number" required>
        </div>

        <div>
            <button type="submit">Submit Order</button>
        </div>
    </form>
</body>
</html>

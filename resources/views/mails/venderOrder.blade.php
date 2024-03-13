<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
</head>
<body>
    <h1>Order Details</h1>
    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Customer Name:</strong> {{ $order->first_name }} {{ $order->last_name }}</p>
    <p><strong>Email:</strong> {{ $order->email }}</p>
    <p><strong>Contact Number:</strong> {{ $order->contact_number }}</p>
    <p><strong>Delivery Address:</strong> {{ $order->delivery_address }}</p>
    <!-- Add more order details as needed -->
    @foreach($orderItems as $item)
    <div>{{ $item->product_name }}</div>
    <div>{{ $item->quantity }}</div>
    <!-- Add other item details here -->
@endforeach
</body>

</html>

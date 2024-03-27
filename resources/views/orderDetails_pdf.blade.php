<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
        }

        .container {
            max-width: 80%;
            height: 100vh;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        th:first-child,
        td:first-child {
            width: 50%;
        }

        .barcode {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Order Details</th>
                    <th>Track Order</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <p><strong>Tracking ID:</strong> {{ $order->tracking_number }}</p>
                        <p><strong>Name:</strong> {{ $order->first_name }} {{ $order->last_name }}</p>
                        <p><strong>Email:</strong> {{ $order->email }}</p>
                        <p><strong>Contact Number:</strong> {{ $order->contact_number }}</p>
                        <p><strong>Delivery Address:</strong> {{ $order->delivery_address }}</p>
                        <p><strong>Postal Code:</strong> {{ $order->postal_code }}</p>
                        <p><strong>Special Instructions:</strong> {{ $order->special_instructions }}</p>
                        <p><strong>Sub Total:</strong> {{ $order->total_price }}</p>
                    </td>
                    <td class="barcode">
                        {!! DNS2D::getBarcodeHTML("https://primetechnology.online/trackOrders/" . $order->id, 'QRCODE') !!}
                    </td>
                    
                </tr>
                <tr>
                    <th>
                        Product Details
                    </th>
                </tr>
                <tr>
                    @foreach ($order->items as $item)
                        <td class="list-group-item"> <strong style="font-size: 20px;">{{ $item->product_name }}</strong>
                            <br>
                            - <strong>Quantity:</strong> {{ $item->quantity }} <br>
                            - <strong>Product color:</strong> {{ $item->product_color }} <br>
                            - <strong>Product size:</strong> {{ $item->product_size }} <br>
                            - <strong>Price:</strong> {{ $item->price }} <br>
                            - <strong>Sub Total:</strong> {{ $item->price * $item->quantity }}
                        </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>

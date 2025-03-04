<!-- filepath: /c:/Users/Al Habib Trade/Desktop/Program Files/files/githu/ShoppingSystem/resources/views/jeans/print.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Jeans Item</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 2rem;
            color: #333;
        }
        .item-details {
            margin-bottom: 20px;
        }
        .item-details img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .item-details h2 {
            font-size: 1.5rem;
            color: #555;
        }
        .item-details p {
            font-size: 1rem;
            color: #666;
        }
        .item-details .price {
            font-size: 1.2rem;
            color: #000;
            font-weight: bold;
        }
        @media print {
            .print-button {
                display: none;
            }
        }
    </style>
</head>

<body>
    <script>
        function printPage() {
            window.print();
        }
    </script>
    <div class="print-button" style="text-align: center; margin-top: 20px;">
        <button onclick="printPage()" style="padding: 10px 20px; font-size: 1rem; cursor: pointer;">Print</button>
    </div>
    <div class="container">
        <div class="header">
            <h1>Jeans Item Details</h1>
        </div>
        <div class="item-details">
            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
            <h2>{{ $item->name }}</h2>
            <p>{{ $item->description }}</p>
            <p class="price">${{ $item->price }}</p>
            <p>Category: {{ $item->category }}</p>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000; /* Black background */
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        h1, h2 {
            text-align: center;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: bold;
            color: #d60000; /* Red heading */
        }

        .card {
            background-color: #111; /* Dark card background */
            border: 2px solid #d60000; /* Red border */
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
            border-color: #ff0000;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.7);
        }

        .card-img-top {
            max-height: 250px;
            object-fit: cover;
            border-bottom: 2px solid #d60000;
        }

        .card-body {
            text-align: center;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            color: #fff;
        }

        .card-text {
            font-size: 16px;
            color: #bbb;
        }

        .price {
            font-size: 18px;
            font-weight: bold;
            color: #ff0000;
        }

        .empty-message {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #bbb;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Welcome to the Clothes Page</h1>

        <!-- Display Clothes Items -->
        <div class="mt-5">
            <h2>Available Clothes</h2>
            <div class="row">
                @forelse($clothes as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <p class="card-text">{{ $item->description }}</p>
                                <p class="price"><strong>Price:</strong> ${{ number_format($item->price, 2) }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="empty-message">No clothes items available yet.</p>
                @endforelse
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
 
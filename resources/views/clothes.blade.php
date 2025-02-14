<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Clothes</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General Page Styles */
        body {
            background-color: white; /* Whitnd */
            color: black; /* Black Text */
            font-family: 'Arial', sans-serif;
        }

        h1, h2 {
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 1px;
            color: black;
            margin-bottom: 30px;
        }

        /* Cards */
        .card {
            background-color: white; /* Whid */
            border: 2px solid red; /* Reer */
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 10px rgba(255, 0, 0, 0.2);
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(255, 0, 0, 0.5);
        }

        .card-img-top {
            max-height: 220px;
            object-fit: cover;
            border-bottom: 2px solid red;
        }

        .card-body {
            text-align: center;
            padding: 15px;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            color: black;
        }

        .card-text {
            font-size: 14px;
            color: black;
        }

        .price {
            font-size: 16px;
            font-weight: bold;
            color: red;
        }

        /* No Items Message */
        .empty-message {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: black;
            margin-top: 20px;
        }

        /* Home Button */
        .home-btn {
            display: inline-block;
            background-color: red;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
            display: block;
            width: 200px;
            text-align: center;
            margin: 30px auto;
            text-transform: uppercase;
            border: 2px solid transparent;
        }

        .home-btn:hover {
            background-color: black;
            color: white;
            border: 2px solid red;
        }
    </style>
</head>
<body>
    <a href="{{ route('home') }}" class="home-btn">Home</a>

    <div class="container mt-5">
        <h1>Welcome to Clothes</h1>

        <!-- Displatems  -->
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

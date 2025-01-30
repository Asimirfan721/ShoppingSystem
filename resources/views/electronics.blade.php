<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronics</title>

    <a href="{{ route('home') }}" class="home-btn">Home</a>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000; /* Black background */
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        h1 {
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
            max-height: 200px;
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

        .home-btn {
            display: inline-block;
            background-color: #d4af37; /* Gold background */
            color: #000; /* Black text */
            padding: 10px 20px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
            margin-top: 30px; /* Space it from other content */
            display: block; /* Make it block-level */
            width: 200px; /* Button width */
            margin-left: auto;
            margin-right: auto; /* Center it horizontally */
        }

        .home-btn:hover {
            background-color: #ffcc00; /* Lighter gold on hover */
        }

        .home-btn:active {
            background-color: #ff9900; /* Darker gold on click */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Electronics Items</h1>
        <div class="row">
            @foreach($items as $item)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <!-- Updated image source path to use public storage link -->
                        <img src="{{ asset('storage/electronics/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <p class="price"><strong>Price:</strong> ${{ number_format($item->price, 2) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

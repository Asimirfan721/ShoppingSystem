<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shirts Collection</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff; /* White background */
            font-family: 'Arial', sans-serif;
            color: #333; /* Dark grey text */
        }

        h1 {
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            color: #d9534f; /* Red heading */
            margin-bottom: 30px;
            letter-spacing: 2px;
        }

        .alert-success {
            background-color: #28a745;
            color: #fff;
            border: none;
            text-align: center;
            padding: 10px;
            font-size: 18px;
            border-radius: 5px;
        }

        .shirts-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .shirt-card {
            background: #fff;
            border: 2px solid #d9534f;
            border-radius: 10px;
            padding: 15px;
            width: 300px;
            text-align: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .shirt-card:hover {
            transform: scale(1.05);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
        }

        .shirt-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            border: 2px solid #d9534f;
            margin-bottom: 10px;
        }

        .shirt-name {
            font-size: 20px;
            font-weight: bold;
            color: #d9534f;
        }

        .shirt-description {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .shirt-price {
            font-size: 18px;
            font-weight: bold;
            color: #d9534f;
        }

        .btn-danger {
            background-color: #d9534f;
            border: none;
            padding: 8px 12px;
            font-weight: bold;
            color: #fff;
            margin-top: 10px;
        }

        .btn-danger:hover {
            background-color: #ff6f61;
        }

        .no-items {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #666;
            margin-top: 20px;
        }

        .add-link {
            color: #d9534f;
            font-weight: bold;
            text-decoration: none;
        }

        .add-link:hover {
            text-decoration: underline;
            color: #ff6f61;
        }

        /* Home Button */
        .home-btn {
            display: block;
            background-color: #d4af37; /* Gold background */
            color: #000; /* Black text */
            padding: 10px 20px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
            width: 200px;
            margin: 20px auto; /* Centering */
        }

        .home-btn:hover {
            background-color: #ffcc00; /* Lighter gold */
        }

        .home-btn:active {
            background-color: #ff9900; /* Darker gold */
        }
    </style>
</head>
<body>

    <a href="{{ route('home') }}" class="home-btn">Home</a>

    <div class="container mt-5">
        <h1>Shirts Collection</h1>

        <!-- Display success message if available -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display shirts collection -->
        @if($shirts->isNotEmpty())
            <div class="shirts-container">
                @foreach($shirts as $item)
                    <div class="shirt-card">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
                        <p class="shirt-name">{{ $item->name }}</p>
                        <p class="shirt-description">{{ $item->description }}</p>
                        <p class="shirt-price">${{ number_format($item->price, 2) }}</p>
                        
                        <a href="{{ route('shirts.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                         <form action="{{ route('shirts.destroy', $item->id) }}" method="POST">
                             @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form> 

                        {{-- <form action="{{ route('shirts.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?')">Delete</button>
                        </form>
                         --}}
                    </div>
                @endforeach
            </div>
        @else
            <p class="no-items">No items found in the Shirts category. <a href="{{ route('shirts.create') }}" class="add-link">Add an item</a>.</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

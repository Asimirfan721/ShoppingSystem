<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronics Collection</title>
    
    <a href="{{ route('home') }}" class="home-btn">Home</a>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light grey background */
            font-family: 'Arial', sans-serif;
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
        }

        table {
            background-color: #fff; /* White background */
            color: #000;
            border: 2px solid #d9534f; /* Red border */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #d9534f; /* Red header */
            color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #d9534f; /* Red border */
        }

        tbody tr:hover {
            background-color: #f1f1f1;
            transition: all 0.3s ease-in-out;
        }

        img {
            border-radius: 5px;
            border: 2px solid #d9534f;
            transition: transform 0.3s ease-in-out;
        }

        img:hover {
            transform: scale(1.1);
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

        .btn-danger {
            background-color: #d9534f;
            border: none;
            padding: 6px 12px;
            font-weight: bold;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #ff6f61;
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
        <h1>Electronics Collection</h1>

        <!-- Display success message if available -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display list of electronics items -->
        @if($items->isNotEmpty())
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td><strong style="color: #d9534f;">${{ number_format($item->price, 2) }}</strong></td>
                            <td>
                                @if($item->image)
                                    <img src="{{ asset('storage/electronics/' . $item->image) }}" alt="{{ $item->name }}" style="width: 100px; height: auto;">
                                @else
                                    <p>No Image</p>
                                @endif
                            </td>
                            <td>
                                {{-- <form action="{{ route('electronics.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="no-items">No items found in the Electronics category. <a href="{{ route('electronics.create') }}" class="add-link">Add an item</a>.</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

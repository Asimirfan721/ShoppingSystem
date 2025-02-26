<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Jeans</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General Page Sty les */
        body {
            background-color: #fff; /* White background */
            color: #000; /* Black text */
            font-family: 'Arial', sans-serif;
        }

        h1 {
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            color: #d60000; /* Red heading */
            margin-bottom: 30px;
            letter-spacing: 2px;
        }

        /* Success Message */
        .alert-success {
            background-color: #28a745;
            color: #fff;
            border: none;
            text-align: center;
        }

        /* Table Styles */
        table {
            background-color: #f9f9f9; /* Light background */
            color: #000; /* Black text */
            border: 2px solid #d60000; /* Red border */
        }

        thead {
            background-color: #d60000; /* Red header */
            color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #d60000; /* Red border */
        }

        tbody tr:hover {
            background-color: #ffe6e6; /* Light red hover effect */
            transition: all 0.3s ease-in-out;
        }

        /* Image Styling */
        img {
            border-radius: 5px;
            border: 2px solid #d60000;
            transition: transform 0.3s ease-in-out;
            max-width: 100px;
        }

        img:hover {
            transform: scale(1.1);
        }

        /* No Items Message */
        .no-items {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #555;
            margin-top: 20px;
        }

        /* Add Item Link */
        .add-link {
            color: #d60000;
            font-weight: bold;
            text-decoration: none;
        }

        .add-link:hover {
            text-decoration: underline;
            color: #ff0000;
        }

        /* Buttons */
        .btn-danger {
            background-color: #d60000;
            border: none;
            padding: 6px 12px;
            font-weight: bold;
        }

        .btn-danger:hover {
            background-color: #ff0000;
        }

        /* Home Button */
        .home-btn {
            display: block;
            background-color: #d4af37; /* Gold */
            color: #000;
            padding: 12px 20px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
            width: 220px;
            margin: 30px auto; /* Center the button */
            text-transform: uppercase;
            border: 2px solid transparent;
        }

        .home-btn:hover {
            background-color: #ffcc00; /* Lighter Gold */
        }

        .home-btn:active {
            background-color: #ff9900; /* Darker Gold */
        }
    </style>
</head>
<body>

    <!-- Home Button -->
    <a href="{{ route('home') }}" class="home-btn">Home</a>


    <div class="container mt-5">
        <h1>Jeans Items</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Jeans Items Table -->
        @if($jeans->isNotEmpty())
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
                    @foreach($jeans as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td><strong>${{ number_format($item->price, 2) }}</strong></td>
                            <td>
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
                                @else
                                    <p>No Image</p>
                                @endif
                             </td>
                            <td>
                             {{-- <a href="{{ route('print', $item->id) }}" class="print-btn btn btn-info btn-sm">Prnt</a> --}}
                                <a href="{{ route('jeans.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('image.delete', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                                <!-- Example button to print a jeans item -->
                                <a href="{{ route('jeans.print', ['id' => $item->id]) }}" class="btn btn-primary">Print</a>
                            </td>   
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="no-items">No items found in the Jeans category. <a href="{{ route('create') }}" class="add-link">Add an item</a>.</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

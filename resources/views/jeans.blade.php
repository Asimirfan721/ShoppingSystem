<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeans</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000; /* Black background */
            color: #fff; /* White text color */
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

        .alert-success {
            background-color: #28a745;
            color: #fff;
            border: none;
            text-align: center;
        }

        table {
            background-color: #111; /* Dark table background */
            color: #fff; /* White text in table */
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
            background-color: #222; /* Slightly lighter black */
            transition: all 0.3s ease-in-out;
        }

        img {
            border-radius: 5px;
            border: 2px solid #d60000;
            transition: transform 0.3s ease-in-out;
        }

        img:hover {
            transform: scale(1.1);
        }

        .no-items {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #fff; /* White text color for "No items" */
            margin-top: 20px;
        }

        .add-link {
            color: #d60000;
            font-weight: bold;
            text-decoration: none;
        }

        .add-link:hover {
            text-decoration: underline;
            color: #ff0000;
        }

        .btn-danger {
            background-color: #d60000;
            border: none;
            padding: 6px 12px;
            font-weight: bold;
        }

        .btn-danger:hover {
            background-color: #ff0000;
        }

        /* Ensuring white color for the text content in the table */
        td {
            color: #fff; /* White text for table content */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Jeans Items</h1>

        <!-- Display success message if available -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display list of jeans items -->
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
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" style="width: 100px; height: auto;">
                                @else
                                    <p>No Image</p>
                                @endif
                            </td>
                            <td>
                                {{-- <form action="{{ route('jeans.destroy', $item->id) }}" method="POST" style="display:inline;">
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
            <p class="no-items">No items found in the Jeans category. <a href="{{ route('create') }}" class="add-link">Add an item</a>.</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

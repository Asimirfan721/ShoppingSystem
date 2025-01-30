<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    
    <a href="{{ route('home') }}" class="home-btn">Home</a>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General page styles */
        body {
            background-color: #111; /* Black background */
            color: white; /* White text */
            font-family: 'Arial', sans-serif;
        }

        h1 {
            text-align: center;
            color: #f44336; /* Red color */
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .container {
            margin-top: 50px;
            background-color: #222; /* Dark background for the container */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        /* Form styles */
        .form-label {
            color: #f44336; /* Red color for labels */
        }

        .form-control {
            background-color: #333; /* Dark input fields */
            border: 1px solid #f44336; /* Red border for inputs */
            color: white; /* White text inside inputs */
        }

        .form-control:focus {
            border-color: #ff4081; /* Lighter red on focus */
            background-color: #444;
            box-shadow: 0 0 0 0.25rem rgba(244, 67, 54, 0.25);
        }

        .form-select {
            background-color: #333; /* Dark dropdown */
            border: 1px solid #f44336; /* Red border */
            color: white; /* White text in dropdown */
        }

        .form-select:focus {
            border-color: #ff4081; /* Lighter red on focus */
            background-color: #444;
            box-shadow: 0 0 0 0.25rem rgba(244, 67, 54, 0.25);
        }

        /* Button styles */
        .btn-primary {
            background-color: #f44336; /* Red button */
            border-color: #f44336; /* Red border for button */
        }

        .btn-primary:hover {
            background-color: #ff4081; /* Lighter red on hover */
            border-color: #ff4081;
        }

        .home-btn {
            display: inline-block;
            background-color: #f44336; /* Red background */
            color: #fff; /* White text */
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
            background-color: #ff4081; /* Lighter red on hover */
        }

        .home-btn:active {
            background-color: #e31b00; /* Darker red on click */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Add New Item</h1>

        <!-- Form to add new item -->
        <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category" required>
                    <option value="electronics" selected>Electronics</option>
                    <option value="clothes">Clothes</option>
                    <option value="jeans">Jeans</option>
                    <option value="shirts">Shirts</option>
                    <option value="watches">Watches</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Item</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

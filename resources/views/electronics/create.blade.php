<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Item</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* General Styles */
        body {
            background-color: white;
            color: black;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            color: red;
            margin-bottom: 25px;
            text-transform: uppercase;
        }

        /* Form Styles */
        .form-label {
            font-weight: bold;
            color: black;
        }

        .form-control, .form-select {
            border: 2px solid black;
            color: black;
        }

        .form-control:focus, .form-select:focus {
            border-color: red;
            box-shadow: 0 0 5px rgba(255, 0, 0, 0.5);
        }

        /* File Input & Image Preview */
        .file-input {
            position: relative;
            overflow: hidden;
            display: block;
            border: 2px solid black;
            border-radius: 5px;
            padding: 8px;
            cursor: pointer;
            text-align: center;
            background-color: white;
            color: black;
            transition: background 0.3s ease;
        }

        .file-input:hover {
            background-color: red;
            color: white;
        }

        #image-preview {
            display: block;
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            border-radius: 5px;
            border: 2px solid black;
            display: none;
        }

        /* Submit Button */
        .btn-submit {
            background-color: red;
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 10px;
            border: none;
            width: 100%;
            border-radius: 5px;
            text-transform: uppercase;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn-submit:hover {
            background-color: black;
        }

        /* Home Button */
        .home-btn {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            font-weight: bold;
            color: white;
            background: black;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .home-btn:hover {
            background: red;
        }
    </style>
</head>
<body>

    <div class="container">
    <a href="{{ route('home') }}" class="home-btn">Home</a>
        <h1>Add New Item</h1>

        <form id="addItemForm" action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Item Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price ($)</label>
                <input type="number" class="form-control" id="price" name="price" min="1" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <label for="image" class="file-input">Choose Image</label>
                <input type="file" class="form-control d-none" id="image" name="image" accept="image/*" required>
                <img id="image-preview">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Select Category</label>
                <select class="form-select" id="category" name="category" required>
                    <option value="electronics">Electronics</option>
                    <option value="clothes">Clothes</option>
                    <option value="jeans">Jeans</option>
                    <option value="shirts">Shirts</option>
                    <option value="watches">Watches</option>
                </select>
            </div>

            <button type="submit" class="btn-submit">Add Item</button>
        </form>

        <a href="{{ route('home') }}" class="home-btn">Home</a>
    </div>

    <script>
        document.getElementById("image").addEventListener("change", function(event) {
            let reader = new FileReader();
            reader.onload = function() {
                let img = document.getElementById("image-preview");
                img.src = reader.result;
                img.style.display = "block";
            };
            reader.readAsDataURL(event.target.files[0]);
        });

        document.getElementById("addItemForm").addEventListener("submit", function(event) {
            let name = document.getElementById("name").value.trim();
            let description = document.getElementById("description").value.trim();
            let price = document.getElementById("price").value.trim();

            if (name === "" || description === "" || price === "") {
                event.preventDefault();
                alert("All fields are required!");
            }
        });
    </script>

</body>
</html>

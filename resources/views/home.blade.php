<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .buttons {
            text-align: center;
        }
        .buttons a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            font-size: 18px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
        .buttons a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="buttons">
        <a href="{{ route('electronics') }}">Electronics</a>
        <a href="{{ route('clothes') }}">Clothes</a>
        <a href="{{ route('jeans') }}">Jeans</a>
        <a href="{{ route('shirts') }}">Shirts</a>
        <a href="{{ route('watches') }}">Watches</a>
        <a href="{{ route('create') }}">Create</a>
    </div>
</body>
</html>

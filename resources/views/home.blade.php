<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #000; /* Black background */
            font-family: 'Arial', sans-serif;
        }

        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.1); /* Light transparent effect */
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(255, 0, 0, 0.3); /* Red glow effect */
        }

        h1 {
            color: #fff;
            font-size: 36px;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .buttons a {
            width: 220px;
            padding: 12px 0;
            font-size: 20px;
            font-weight: bold;
            color: #fff;
            background: linear-gradient(90deg, #d60000, #ff0000); /* Red gradient */
            text-decoration: none;
            text-transform: uppercase;
            border-radius: 50px;
            transition: all 0.3s ease-in-out;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .buttons a:hover {
            background: #fff;
            color: #d60000;
            border-color: #d60000;
            transform: scale(1.05);
        }

        .buttons a::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease-in-out;
        }

        .buttons a:hover::before {
            left: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our Store</h1>
        <div class="buttons">
            <a href="{{ route('electronics') }}">Electronics</a>
            <a href="{{ route('clothes') }}">Clothes</a>
            <a href="{{ route('jeans') }}">Jeans</a>
            <a href="{{ route('shirts') }}">Shirts</a>
            <a href="{{ route('watches') }}">Watches</a>
            <a href="{{ route('create') }}">Create</a>
        </div>
    </div>
</body>
</html>

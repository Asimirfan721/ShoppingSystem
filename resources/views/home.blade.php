<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Store</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: radial-gradient(circle, #1a1a1a, #000);
            overflow: hidden;
        }

        .container {
            width: 80%;
            height: 80vh;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(255, 0, 0, 0.3);
            text-align: center;
            padding: 30px;
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        h1 {
            font-size: 2.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 0 0 10px rgba(255, 0, 0, 0.8);
        }

        .button {
            display: inline-block;
            margin: 20px;
            padding: 15px 30px;
            font-size: 1.2rem;
            text-decoration: none;
            color: #fff;
            background: linear-gradient(90deg, #e63946, #ff6666);
            border-radius: 50px;
            box-shadow: 0 5px 15px rgba(230, 57, 70, 0.4);
            transition: all 0.3s ease-in-out;
            position: relative;
        }

        .button:hover {
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(255, 100, 100, 0.8);
        }

        .animation span {
            position: absolute;
            width: 15px;
            height: 15px;
            background: rgba(255, 0, 0, 0.7);
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.7);
            border-radius: 50%;
            animation: float 6s infinite;
            opacity: 0.7;
        }

        @keyframes float {
            0% {
                transform: translateY(0) scale(1);
            }
            50% {
                transform: translateY(-30px) scale(1.1);
            }
            100% {
                transform: translateY(0) scale(1);
            }
        }

        .animation span:nth-child(1) {
            top: 80%;
            left: 20%;
            animation-duration: 6s;
        }
        .animation span:nth-child(2) {
            top: 60%;
            left: 50%;
            animation-duration: 8s;
        }
        .animation span:nth-child(3) {
            top: 40%;
            left: 70%;
            animation-duration: 10s;
        }
    </style>
</head>
<body>
    <div class="animation">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="container">
        <h1>Welcome to Our Modern Store</h1>
        <a href="{{ route('electronics') }}" class="button">Electronics</a>
        <a href="{{ route('clothes') }}" class="button">Clothes</a>
        <a href="{{ route('jeans') }}" class="button">Jeans</a>
        <a href="{{ route('shirts') }}" class="button">Shirts</a>
        <a href="{{ route('watches') }}" class="button">Watches</a>
        <a href="{{ route('create') }}" class="button">Create</a>
    </div>
</body>
</html>
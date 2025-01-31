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
            background: linear-gradient(135deg, #000, #1a1a1a); /* Black gradient background */
            font-family: 'Arial', sans-serif;
            color: #fff;
            overflow: hidden;
        }

        .container {
            width: 75%;
            height: 75vh;
            background: #fff; /* White background */
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(255, 0, 0, 0.5); /* Red glow effect */
            position: relative;
            overflow: hidden;
        }

        h1 {
            text-align: center;
            color: #d60000;
            font-size: 36px;
            margin-top: 30px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: bold;
            text-shadow: 0 0 8px rgba(255, 0, 0, 0.4);
        }

        /* Stylish button styles */
        .button {
            position: absolute;
            padding: 15px 30px;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            background: linear-gradient(90deg, #d60000, #ff0000);
            text-decoration: none;
            text-transform: uppercase;
            border-radius: 50px;
            transition: all 0.3s ease-in-out;
            border: 2px solid transparent;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .button:hover {
            background: #fff;
            color: #d60000;
            border-color: #d60000;
            transform: scale(1.08);
            box-shadow: 0 0 12px rgba(255, 0, 0, 0.6);
        }

        /* Placing buttons randomly */
        .electronics { top: 20%; left: 10%; }
        .clothes { top: 35%; right: 10%; }
        .jeans { top: 50%; left: 20%; }
        .shirts { top: 65%; right: 20%; }
        .watches { top: 80%; left: 30%; }
        .create { top: 85%; right: 30%; }

        /* Floating animated effect */
        .animation span {
            position: absolute;
            width: 12px;
            height: 12px;
            background: rgba(255, 0, 0, 0.7);
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.7);
            animation: animate 8s linear infinite;
        }

        @keyframes animate {
            0% {
                transform: translateY(0) scale(1);
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) scale(0);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <div class="animation">
        <span style="top: 80%; left: 20%; animation-duration: 6s;"></span>
        <span style="top: 60%; left: 50%; animation-duration: 8s;"></span>
        <span style="top: 40%; left: 70%; animation-duration: 10s;"></span>
        <span style="top: 90%; left: 10%; animation-duration: 7s;"></span>
        <span style="top: 50%; left: 80%; animation-duration: 9s;"></span>
    </div>

    <div class="container">
        <h1>Welcome to Our Store</h1>
        <a href="{{ route('electronics') }}" class="button electronics">Electronics</a>
        <a href="{{ route('clothes') }}" class="button clothes">Clothes</a>
        <a href="{{ route('jeans') }}" class="button jeans">Jeans</a>
        <a href="{{ route('shirts') }}" class="button shirts">Shirts</a>
        <a href="{{ route('watches') }}" class="button watches">Watches</a>
        <a href="{{ route('create') }}" class="button create">Create</a>
    </div>
</body>
</html>

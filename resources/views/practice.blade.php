<a href="{{ route('home') }}" class="home-btn">Home</a>
<a href="{{ route('shirts') }}" class="home-btn">Shirts</a>
<a href="{{ route('jeans') }}" class="home-btn">Jeans</a>
<a href="{{ route('watches') }}" class="home-btn">Watches</a>
<a href="{{ route('electronics') }}" class="home-btn">Electronics</a>
<a href="{{ route('clothes') }}" class="home-btn">Clothes</a>
<style>
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
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Message</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        .success-message {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f4f8;
        }
        .message-box {
            padding: 20px;
            background-color: #4caf50;
            color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <div class="success-message">
        <div class="message-box">
            Success! Your operation was completed.
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.2/cdn.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        /* Background Animation */
        .animation span {
            position: center;
            width: 15px;
            height: 15px;
            background: rgba(255, 255, 255, 0.6);
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            animation: float 6s infinite;
            opacity: 0.7;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-30px) scale(1.1); }
        }
        .animation span:nth-child(1) { top: 80%; left: 20%; animation-duration: 6s; }
        .animation span:nth-child(2) { top: 60%; left: 50%; animation-duration: 8s; }
        .animation span:nth-child(3) { top: 40%; left: 70%; animation-duration: 10s; }

        /* Button Styling */
        .category-btn {
            display: block;
            text-align: center;
            padding: 12px 20px;
            font-size: 1.1rem;
            font-weight: 600;
            color: White;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            transition: all 0.3s ease-in-out;
            text-transform: uppercase;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .category-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(255, 255, 255, 0.4);
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Loading Spinner */
        .loader {
            display: none;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Profile Dropdown */
        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: #333;
            color: #fff;
            border-radius: 8px;
            padding: 10px 0;
            min-width: 150px;
            z-index: 10;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
        }

        .dropdown-menu a {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            color: inherit;
            transition: background-color 0.3s;
        }

        .dropdown-menu a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Profile Icon */
        .profile-btn {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .profile-btn img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-indigo-900 via-purple-900 to-pink-900 text-white flex items-center justify-center h-screen">

    <!-- Floating Background Animation -->
    <div class="animation">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="relative w-full max-w-4xl p-8 bg-gray-800 rounded-xl shadow-lg">
        <!-- Header with User Profile -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-4xl font-bold text-yellow-400"> Modern Store</h1>
            
            <!-- Profile Dropdown -->
            @auth
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="profile-btn">
                    <img src="https://i.pravatar.cc/40" alt="User Avatar">
                    <span class="text-lg font-medium">{{ Auth::user()->name }}</span>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false" class="dropdown-menu">
                    <a href="{{ route('profile') }}" class="hover:bg-gray-200">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-200">Logout</button>
                    </form>
                </div>
            </div>
            @endauth
        </div>

        <!-- Category Buttons -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
            <a href="{{ route('electronics') }}" class="category-btn">Electronics</a>
            <a href="{{ route('clothes') }}" class="category-btn">Clothes</a>
            <a href="{{ route('jeans') }}" class="category-btn">Jeans</a>
            <a href="{{ route('shirts') }}" class="category-btn">Shirts</a>
            <a href="{{ route('watches') }}" class="category-btn">Watches</a>
            <a href="{{ route('create') }}" class="category-btn">Create</a>
            <a href="{{ route('image') }}" class="category-btn">Image</a>
        </div>

        <!-- Loading Spinner -->
        <div class="loader" id="loader"></div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Close dropdown when clicking outside
            document.addEventListener("click", function(event) {
                let dropdown = document.querySelector('[x-data]');
                if (!dropdown.contains(event.target)) {
                    dropdown.__x.$data.open = false;
                }
            });

             
            $('.category-btn').on('click', function(event) {
                event.preventDefault();
                $('#loader').show();

                setTimeout(function() {
                    $('#loader').hide();
                    window.location.href = $(event.target).attr('href');  // Redirect to the category page
                }, 1000);  // Simulating AJAX delay
            });
        });
    </script>

</body>
</html>

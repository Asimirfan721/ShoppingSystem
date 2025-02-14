<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.2/cdn.min.js" defer></script>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        /* Background Animation */
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
            color: white;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
            text-transform: uppercase;
        }

        .category-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.4);
            transform: translateY(-3px);
            box-shadow: 0px 5px 15px rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
 
<body class="bg-gray-900 text-white flex items-center justify-center h-screen">

    <!-- Floating Background Animation -->
    <div class="animation">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="relative w-full max-w-4xl p-6 bg-gray-800 rounded-xl shadow-lg">
        <!-- Header with User Profile -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-red-400">Welcome to Our Modern Store</h1>
            
            <!-- Profile Dropdown -->
            @auth
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                    <img src="https://i.pravatar.cc/40" alt="User Avatar" class="w-10 h-10 rounded-full">
                    <span class="text-lg font-medium">{{ Auth::user()->name }}</span>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-40 bg-white text-gray-900 rounded-lg shadow-lg overflow-hidden z-10">
                    <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-200">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-200">Logout</button>
                    </form>
                </div>
            </div>
            @endauth
        </div>

        <!-- Category Buttons -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <a href="{{ route('electronics') }}" class="category-btn">Electronics</a>
            <a href="{{ route('clothes') }}" class="category-btn">Clothes</a>
            <a href="{{ route('jeans') }}" class="category-btn">Jeans</a>
            <a href="{{ route('shirts') }}" class="category-btn">Shirts</a>
            <a href="{{ route('watches') }}" class="category-btn">Watches</a>
            <a href="{{ route('create') }}" class="category-btn">Create</a>
        </div>
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
        });
    </script>

</body>
</html>

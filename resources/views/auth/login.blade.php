<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Login</h2>

        <!-- Alert Message -->
        <div id="message" class="hidden p-3 mb-4 text-white text-center rounded"></div>

        <form id="loginForm">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500" placeholder="Enter your email" required>
                <small id="emailError" class="text-red-500"></small>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Password</label>
                <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500" placeholder="Enter password" required>
                <small id="passwordError" class="text-red-500"></small>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white font-semibold p-2 rounded hover:bg-blue-600 transition duration-300">
                Login
            </button>
        </form>

        <p class="text-center mt-4 text-gray-600">
            Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 font-semibold hover:underline">Register</a>
        </p>
    </div>

    <script>
        $(document).ready(function() {
            $('#loginForm').submit(function(e) {
                e.preventDefault();

                let formData = $(this).serialize();
                let email = $('#email').val().trim();
                let password = $('#password').val();

                // Clear previous errors
                $('.text-red-500').text('');

                // Simple Frontend Validation
                if (email === '') {
                    $('#emailError').text('Email is required.');
                    return;
                }
                if (password === '') {
                    $('#passwordError').text('Password is required.');
                    return;
                }

                // AJAX Request
                $.ajax({
                    url: "{{ route('login') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $('#message').removeClass('hidden bg-red-500').addClass('bg-green-500').text('Login successful! Redirecting...').show();
                        setTimeout(function() {
                            window.location.href = "{{ route('home') }}"; // Redirect to home page
                        }, 2000);
                    },
                    error: function(xhr) {
                        $('#message').removeClass('hidden bg-green-500').addClass('bg-red-500').text('Invalid credentials!').show();
                    }
                });
            });
        });
    </script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Register</h2>
        
        <!-- Alert Message -->
        <div id="message" class="hidden p-3 mb-4 text-white text-center rounded"></div>

        <form id="registerForm">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Name</label>
                <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500" placeholder="Enter your name" required>
                <small id="nameError" class="text-red-500"></small>
            </div>

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

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500" placeholder="Confirm password" required>
                <small id="confirmPasswordError" class="text-red-500"></small>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white font-semibold p-2 rounded hover:bg-blue-600 transition duration-300">
                Register
            </button>
        </form>

        <p class="text-center mt-4 text-gray-600">
            Already have an account? <a href="{{ route('login') }}" class="text-blue-500 font-semibold hover:underline">Login</a>
        </p>
    </div>

    <script>
        $(document).ready(function() {
            $('#registerForm').submit(function(e) {
                e.preventDefault();

                let formData = $(this).serialize();
                let name = $('#name').val().trim();
                let email = $('#email').val().trim();
                let password = $('#password').val();
                let confirmPassword = $('#password_confirmation').val();

                // Clear previous errors
                $('.text-red-500').text('');

                // Simple Frontend Validation
                if (name === '') {
                    $('#nameError').text('Name is required.');
                    return;
                }
                if (email === '') {
                    $('#emailError').text('Email is required.');
                    return;
                }
                if (password.length < 6) {
                    $('#passwordError').text('Password must be at least 6 characters.');
                    return;
                }
                if (password !== confirmPassword) {
                    $('#confirmPasswordError').text('Passwords do not match.');
                    return;
                }

                // AJAX Request
                $.ajax({
                    url: "{{ route('register') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $('#message').removeClass('hidden bg-red-500').addClass('bg-green-500').text('Registration successful! Redirecting...').show();
                        setTimeout(function() {
                            window.location.href = "{{ route('login') }}";
                        }, 2000);
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        if (errors.name) $('#nameError').text(errors.name[0]);
                        if (errors.email) $('#emailError').text(errors.email[0]);
                        if (errors.password) $('#passwordError').text(errors.password[0]);
                        $('#message').removeClass('hidden bg-green-500').addClass('bg-red-500').text('Registration failed!').show();
                    }
                });
            });
        });
    </script>

</body>
</html>

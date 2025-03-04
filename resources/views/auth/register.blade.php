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

        <form id="registerForm" enctype="multipart/form-data">
            @csrf

            <!-- Profile Image Upload -->
            <div class="mb-4 text-center">
                <label class="block text-gray-700 font-semibold">Profile Image</label>
                <input type="file" id="profile_image" name="profile_image" accept="image/*"
                       class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
                <small id="imageError" class="text-red-500"></small>

                <!-- Image Preview -->
                <div class="mt-3">
                    <img id="imagePreview" class="hidden w-24 h-24 rounded-full mx-auto shadow-md">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Name</label>
                <input type="text" id="name" name="name"
                       class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500"
                       placeholder="Enter your name" required>
                <small id="nameError" class="text-red-500"></small>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Email</label>
                <input type="email" id="email" name="email"
                       class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500"
                       placeholder="Enter your email" required>
                <small id="emailError" class="text-red-500"></small>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Password</label>
                <input type="password" id="password" name="password"
                       class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500"
                       placeholder="Enter password" required>
                <small id="passwordError" class="text-red-500"></small>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                       class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500"
                       placeholder="Confirm password" required>
                <small id="confirmPasswordError" class="text-red-500"></small>
            </div>

            <button type="submit"
                    class="w-full bg-blue-500 text-white font-semibold p-2 rounded hover:bg-blue-600 transition duration-300">
                Register
            </button>
        </form>

        <p class="text-center mt-4 text-gray-600">
            Already have an account? <a href="{{ route('login') }}" class="text-blue-500 font-semibold hover:underline">Login</a>
        </p>
    </div>

    <script>
        $(document).ready(function () {
            // Preview Image on Upload
            $('#profile_image').change(function () {
                let file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        $('#imagePreview').attr('src', e.target.result).removeClass('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Submit Form with AJAX
            $('#registerForm').submit(function (e) {
                e.preventDefault();
                
                let formData = new FormData(this);

                // Clear previous errors
                $('.text-red-500').text('');
                $('#message').hide();

                // AJAX Request
                $.ajax({
                    url: "{{ route('register') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $('#message').removeClass('hidden bg-red-500')
                                     .addClass('bg-green-500')
                                     .text('Registration successful! Redirecting...')
                                     .show();
                        setTimeout(function () {
                            window.location.href = "{{ route('login') }}";
                        }, 2000);
                    },
                    error: function (xhr) {
                        let errors = xhr.responseJSON.errors;
                        if (errors.profile_image) $('#imageError').text(errors.profile_image[0]);
                        if (errors.name) $('#nameError').text(errors.name[0]);
                        if (errors.email) $('#emailError').text(errors.email[0]);
                        if (errors.password) $('#passwordError').text(errors.password[0]);

                        $('#message').removeClass('hidden bg-green-500')
                                     .addClass('bg-red-500')
                                     .text('Registration failed!')
                                     .show();
                    }
                });
            });
        });
    </script>

</body>
</html>

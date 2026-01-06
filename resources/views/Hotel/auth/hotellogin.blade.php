<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 to-red-200 px-4">

    <form method="post" action="{{ route('owner.login') }}"
        class="w-full max-w-md bg-white rounded-xl shadow-lg p-6 space-y-5">
        @csrf


        <div class="text-center">
            <h2 class="text-3xl font-bold text-blue-800">Welcome Back</h2>
            <p class="text-gray-500 text-sm mt-1">Sign in to continue</p>
        </div>


        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Email
            </label>
            <input
                type="email"
                name="email"
                placeholder="Enter your email"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            >
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                User Type
            </label>
            <select
                name="user_type"
                id="user_type"
                class="w-full px-4 py-2 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option value="hotels">Hotel</option>
                <option value="staffs">Staff</option>
            </select>
        </div>


       <div>
    <label class="block text-sm font-medium text-gray-700 mb-1">
        Password
    </label>

    <div class="relative">
        <input
            type="password"
            name="password"
            id="password"
            placeholder="Enter your password"
            class="w-full px-4 py-2 pr-12 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
        >

        <!-- Show / Hide Button -->
        <button
            type="button"
            onclick="togglePassword()"
            class="absolute inset-y-0 right-3 flex items-center text-sm text-gray-600 hover:text-blue-600"
        >
            <span id="toggleText">Show</span>
        </button>
    </div>
</div>


        <button
            type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded-md font-semibold hover:bg-blue-500 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400"
        >
            Log In
        </button>


        <div class="text-center">
            <a href="{{ route('login') }}" class="text-sm font-semibold text-blue-700 hover:underline">
                Login as Admin
            </a>
        </div>


        @if ($errors->any())
            <div class="bg-red-50 border border-red-300 text-red-600 text-sm rounded-md p-3">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
<script>
    function togglePassword() {
        const passwordInput = document.getElementById("password");
        const toggleText = document.getElementById("toggleText");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleText.textContent = "Hide";
        } else {
            passwordInput.type = "password";
            toggleText.textContent = "Show";
        }
    }
</script>

</body>


</html>

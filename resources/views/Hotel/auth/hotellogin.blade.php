<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="w-full h-screen flex justify-center items-center bg-gradient-to-r from-blue-500 to-red-200">
    <form method="post" action="{{ route('owner.login') }}"
        class="w-full max-w-md h-auto border border-gray-300 bg-slate-100 rounded-md flex flex-col px-3 py-2 ">
        @csrf
        <h2 class="font-bold text-3xl text-center mb-3 text-blue-800">Welcome Back</h2>
        <div class="mb-4">
        <label for="" class="block text-xl mb-1">Email</label>
        <input type="email" name="email" placeholder="Enter your Email" class="rounded-md border w-full  border-gray-300">
</div>
        <div class="mb-4">
        <label for="user_type" class="block text-xl mb-1">User</label>
        <select name="user_type" id="user_type" class="w-full border border-gray-300 rounded-md cursor-pointer">
            <option value="hotels">hotel</option>
            <option value="staffs">staff</option>
        </select>
</div>
        <div class="mb-4">
            <label for="" class="block text-xl mb-1">Password</label>
            <input type="password" name="password" placeholder="Enter your Password" class="rounded-md border w-full border-gray-300">
            </div>

        <button type="submit" class=" bg-blue-600 text-white px-3 py-2 rounded-md hover:bg-blue-400 mb-2">Log
            In</button>
        <a href="{{ route('login') }}" class="px-3 text-center text-md font-semibold text-blue-800">Login as admin</a>
    {{-- keep in layout as notification --}}
       @if ($errors->any())
            <div class="mt-3 text-red-500 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</body>

</html>

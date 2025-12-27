<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="w-full h-screen flex justify-center items-center bg-slate-100">
    <form method="post" action="{{ route('owner.login') }}"
        class="w-64 h-85 border border-gray-300 bg-white rounded-md flex flex-col px-3 py-2 ">
        @csrf
        <div class="mb-4">
        <label for="" class="block text-xl mb-1">email</label>
        <input type="email" name="email" class="rounded-md border w-full  border-gray-300">
</div>
    <div class="mb-4">
        <label for="" class="block text-xl mb-1">password</label>
        <input type="password" name="password" class="rounded-md border w-full border-gray-300">
        </div>
        <button type="submit" class=" bg-blue-600 text-white px-3 py-2 rounded-md hover:bg-blue-400 mb-2">Log
            In</button>
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

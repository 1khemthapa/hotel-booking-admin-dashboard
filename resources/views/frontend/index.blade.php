<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen w-screen bg-white grid grid-cols-3 justify-items-center">

    @foreach($packages as $package)


    <div class=" w-[65vmin]  h-64  border shadow-md bg-gradient-to-r from-red-300 to orange-100 rounded-md flex flex-col items-center gap-3 mt-2">

        <h3 class="mt-3 text-xl font-bold font-sans">{{$package->hotel->name}}</h3>
    <h3 >{{ $package->package_name }}</h3>

    <p class="font-semibold">Price: Rs.{{ $package->price }}</p>

    @if($package->isBooked())
        <span style="color:red; ">Booked</span>
    @else
        <span style="color:green;">Available</span>


            <a href="{{ route('frontend.create') }}"  class="bg-green-500 text-white rounded-md px-3 py-2 hover:bg-green-400">Book Now</a>

    @endif
</div>

@endforeach

</body>
</html>

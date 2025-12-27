<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen w-screen flex bg-slate-200 justify-center items-center py-3">
    <form action=" {{ route('frontend.store') }} " method="POST"
        class=" w-1/2 bg-white flex flex-col mt-10 rounded-md px-2 py-2">
        @csrf
        <label for="" class="mt mb-2 font-semibold">Customer full name</label>
        <input type="text" name="customer_name" placeholder="Enter your name"
            class="px-3 py-2 border border-gray-300 rounded-md mb-2">

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Hotel
            </label>
            <select name="hotel_id"
                class="select-searchable w-full rounded-md text-sm border border-gray-300 cursor-pointer">
                <option value="">Select hotels</option>
                @foreach ($hotels as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                @endforeach
            </select>
        </div>
        

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Package
            </label>
            <select name="package_id"
                class="select-searchable w-full rounded-md text-sm border border-gray-300 cursor-pointer">
                <option value="">Select packages</option>
                @foreach ($packages as $package)
                    <option value="{{ $package->id }}">{{ $package->package_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Pax</label>
            <input type="number" name="pax" placeholder="Total people"
                class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm cursor-pointer">
        </div>


        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Booking Date
            </label>
            <input type="date" name="booked_date" placeholder="booked date"
                class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Check In Date
            </label>
            <input type="date" name="check_in_date" placeholder="check in date"
                class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Check Out Date
            </label>
            <input type="date" name="check_out_date" placeholder="check out date"
                class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Notes
            </label>
            <textarea name="notes" rows="3" placeholder="Enter address"
                class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm"></textarea>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
            Save
        </button>
    </form>

</body>

</html>

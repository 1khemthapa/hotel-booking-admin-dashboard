{{-- <x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
         Add Hotels
        </h2>
        <a href="{{ route('packages.index') }}" class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Back</a>
        </div>
    </x-slot>
   <form action="{{ route ('packages.store')}}"
      method="POST"
      class="max-w-md mx-auto mt-2 bg-white p-6 rounded-lg shadow">
    @csrf


    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">
            Package Name
        </label>
        <input type="text"
               name="package_name"
               placeholder="Enter package name"
               class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm ">
    </div>


    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">
            Hotel
        </label>
        <select name="hotel_id" required class="w-full rounded-md px-3 py-2 border border-gray-300">
            <option>Select Hotel</option>
            @foreach ($hotels as $hotel )
            <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">
            Status
        </label>
        <select name="status"
                class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm cursor-pointer">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>


    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">
            Price
        </label>
        <input type="number" name="price" id="price" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
    </div>

    <button type="submit"
            class="w-full bg-blue-700 text-white py-2 rounded-md hover:bg-blue-500">
        Save
    </button>
</form>


</x-app-layout> --}}

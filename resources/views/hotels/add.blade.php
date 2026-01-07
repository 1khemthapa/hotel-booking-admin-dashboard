<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
         Add Hotels
        </h2>
        <a href="{{ route('hotels.index') }}" class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Back</a>
        </div>
    </x-slot>
   <form action="{{ route ('hotels.store')}}"
      method="POST"
      class="w-auto   m-8   bg-white p-6 rounded-lg shadow">
    @csrf

    <div class="w-auto grid grid-cols-2 gap-6 mb-4 bg-white ">
    <div>
        <label class="block text-sm font-medium mb-1">
            Hotel Name
        </label>
        <input type="text"
               name="name"
               placeholder="Enter full name"
               class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm ">
    </div>


    <div>
        <label class="block text-sm font-medium mb-1">
            Contact Number
        </label>
        <input type="text"
               name="contact"
               placeholder="98XXXXXXXX"
               class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
    </div>


    <div >
        <label class="block text-sm font-medium mb-1">
            Email Address
        </label>
        <input type="email"
               name="email"
               placeholder="example@email.com"
               class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
    </div>


    <div >
        <label class="block text-sm font-medium mb-1">
            Status
        </label>
        <select name="status"
                class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm cursor-pointer">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>
    <div >
        <label class="block text-sm font-medium mb-1">
            Type
        </label>
        <select
        name="type"
        id="type"
        class=" rounded border-gray-300 cursor-pointer focus:border-indigo-500 focus:ring-indigo-500 w-full"
    >
        <option value="" >Select type</option>
        <option value="hotel">Hotel</option>
        <option value="restaurant">Restaurant</option>
    </select>
    </div>

    <div >
        <label class="block text-sm font-medium mb-1">
            Username
        </label>
        <input type="text" name="username" id="username" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
    </div>
    <div >
        <label  class="block text-sm font-medium mb-1">
            Password
        </label>
        <input type="password" name="password" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
    </div>
    <div >
        <label class="block text-sm font-medium mb-1">
            Address
        </label>
        <textarea name="address"
                  rows="1"
                  placeholder="Enter address"
                  class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm"></textarea>
    </div>
    <textarea name="notes" placeholder="Remarks" class="w-full border border-gray-300 rounded-md px-2 text-sm"></textarea>
</div>
    <button type="submit"
            class="w-full bg-blue-700 text-white py-2 rounded-md hover:bg-blue-500">
        Save
    </button>
</form>


</x-app-layout>

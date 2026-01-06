<x-staff-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
         AddCustomer
        </h2>
        <a href="{{ route('staffcustomers.index') }}" class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Back</a>
        </div>
    </x-slot>
   <form action="{{ route('staffcustomers.store') }}"
      method="POST"
      class="max-w-md mx-auto mt-2 bg-white p-6 rounded-lg shadow">
    @csrf


    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">
            Full Name
        </label>
        <input type="text"
               name="full_name"
               placeholder="Enter full name"
               class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm ">
    </div>


    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">
            Contact Number
        </label>
        <input type="number"
               name="contact"
               placeholder="98XXXXXXXX"
               class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
    </div>


    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">
            Email Address
        </label>
        <input type="email"
               name="email"
               placeholder="example@email.com"
               class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">
            Address
        </label>
        <textarea name="address"
                  rows="3"
                  placeholder="Enter address"
                  class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm"></textarea>
    </div>
     <div class="mb-4">
        <label class="block text-sm font-medium mb-1">
            DOB
        </label>
        <input type="date"
               name="dob"
               placeholder="date of birth"
               class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
    </div>

    <button type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
        Save
    </button>
</form>


</x-staff-layout>

<x-hotel-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                AddCustomer
            </h2>
            <a href="{{ route('hotelcustomers.index') }}"
                class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Back</a>

        </div>
    </x-slot>
    <form action="{{ route('hotelcustomers.store') }}" method="POST"
        class="max-w-full m-8 mt-12  bg-white p-6 rounded-lg shadow">
        @csrf

        <div>
            <div class="grid grid-cols-2 gap-6 mb-4">
                <div>
                    <label class="block text-sm font-medium mb-1">
                        Full Name
                    </label>
                    <input type="text" name="full_name" placeholder="Enter full name"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm ">
                </div>


                <div>
                    <label class="block text-sm font-medium mb-1">
                        Contact Number
                    </label>
                    <input type="number" name="contact" placeholder="98XXXXXXXX"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>


                <div>
                    <label class="block text-sm font-medium mb-1">
                        Email Address
                    </label>
                    <input type="email" name="email" placeholder="example@email.com"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">
                        Address
                    </label>
                    <input name="address" placeholder="Enter address"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm"></input>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">
                        DOB
                    </label>
                    <input type="date" name="dob" placeholder="date of birth"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
                Save
            </button>
        </div>
    </form>


</x-hotel-layout>

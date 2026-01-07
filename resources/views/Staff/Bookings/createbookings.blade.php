<x-staff-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Bookings
            </h2>

            <a href="{{ route('staffbookings.index') }}"
                class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Back</a>

        </div>
    </x-slot>
    <form action="{{ route('staffbookings.store') }}" method="POST"
        class="max-w-full m-8 mt-12 bg-white p-6 rounded-lg shadow">
        @csrf
        <div>
            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium ">
                        Customer
                    </label>
                    <select name="customer_id"
                        class="select-searchable w-full rounded-md text-sm border border-gray-300 cursor-pointer">
                        <option value="">Select customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->full_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium ">
                        Packages
                    </label>
                    <select name="package_id"
                        class="select-searchable w-full rounded-md text-sm border border-gray-300 cursor-pointer">
                        <option value="">Select packages</option>
                        @foreach ($packages as $package)
                            <option value="{{ $package->id }}">{{ $package->package_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium ">Pax</label>
                    <input type="number" name="pax" placeholder="Total people"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm cursor-pointer">
                </div>


                <div>
                    <label class="block text-sm font-medium ">
                        Booking Date
                    </label>
                    <input type="date" name="booked_date" placeholder="booked date"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium ">
                        Check In Date
                    </label>
                    <input type="date" name="check_in_date" placeholder="check in date"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium ">
                        Check Out Date
                    </label>
                    <input type="date" name="check_out_date" placeholder="check out date"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium ">
                        Notes
                    </label>
                    <textarea name="notes" rows="1" placeholder="Enter address"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm"></textarea>
                </div>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
                Save
            </button>
        </div>
    </form>


</x-staff-layout>

<x-hotel-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Bookings/Edit
            </h2>
            <a href="{{ route('hotelbookings.index') }}"
                class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('hotelbookings.update', $booking->id) }}" method="post">
                        @csrf
                        <div>
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <label for="" class="text-sm font-medium block">Customer name</label>
                                    <select name="customer_id" id=""
                                        class="w-full rounded-md border border-gray-300 text-sm cursor-pointer">
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->full_name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div>
                                    <label for="" class="text-sm font-medium block">Package name</label>
                                    <select name="package_id" id=""
                                        class="w-full rounded-md border border-gray-300 text-sm cursor-pointer">
                                        @foreach ($packages as $package)
                                            <option value="{{ $package->id }}">{{ $package->package_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="" class="text-sm font-medium block">Pax</label>
                                    <input value="{{ old('pax', $booking->pax) }}" name="pax" type="number"
                                        placeholder="Enter Pax" class="border-gray-300 shadow-sm w-full rounded-lg">
                                    @error('pax')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="" class="text-sm font-medium block">Book Date</label>
                                    <input value="{{ old('booked_date', $booking->booked_date) }}" name="booked_date"
                                        type="date" placeholder="Enter Booking date"
                                        class="border-gray-300 shadow-sm w-full rounded-lg">
                                    @error('booked_date')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="" class="text-sm font-medium block">Check In Date</label>
                                    <input value="{{ old('check_in_date', $booking->check_in_date) }}"
                                        name="check_in_date" type="date" placeholder="Enter Check in date"
                                        class="border-gray-300 shadow-sm w-full rounded-lg">
                                    @error('check_in_date')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="" class="text-sm font-medium block">Check Out Date</label>
                                    <input value="{{ old('check_out_date', $booking->check_out_date) }}"
                                        name="check_out_date" type="date" placeholder="Enter Check out date"
                                        class="border-gray-300 shadow-sm w-full rounded-lg">
                                    @error('check_out_date')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="" class="text-sm font-medium block">Notes</label>
                                    <input value="{{ old('notes', $customer->notes) }}" name="notes" type="text"
                                        placeholder="Enter Email" class="border-gray-300 shadow-sm w-full rounded-lg">
                                    @error('notes')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <button
                                class="bg-slate-700 hover:bg-slate-500 cursor-pointer text-sm rounded-md px-5 py-2 mt-4 w-full text-white">Update</button>
                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
</x-hotel-layout>

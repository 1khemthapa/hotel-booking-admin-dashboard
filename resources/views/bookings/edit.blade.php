{{-- <x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Bookings/Edit
            </h2>
            <a href="{{ route('bookings.index') }}" class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('bookings.update',$booking->id) }}" method="post">
                        @csrf
                        <div>
                            <label for="" class="text-sm font-medium">Customer name</label>
                            <div class="my-3">
                                <select name="customer_id" id="" class="w-1/2 rounded-md border border-gray-300 text-sm cursor-pointer">
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{$customer->full_name}}</option>


                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="" class="text-sm font-medium">Hotel name</label>
                            <div class="my-3">
                                <select name="hotel_id" id="" class="w-1/2 rounded-md border border-gray-300 text-sm cursor-pointer">
                                    @foreach ($hotels as $hotel)
                                        <option value="{{ $hotel->id }}">{{$hotel->name}}</option>


                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="" class="text-sm font-medium">Package name</label>
                            <div class="my-3">
                                <select name="package_id" id="" class="w-1/2 rounded-md border border-gray-300 text-sm cursor-pointer">
                                    @foreach ($packages as $package)
                                        <option value="{{ $package->id }}">{{$package->package_name}}</option>


                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <div>
                                <label for="" class="text-sm font-medium">Pax</label>
                                <div class="my-3">
                                    <input value="{{ old('pax', $booking->pax) }}" name="pax" type="number"
                                        placeholder="Enter Pax" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                    @error('pax')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="" class="text-sm font-medium">Book Date</label>
                                <div class="my-3">
                                    <input value="{{ old('booked_date', $booking->booked_date) }}" name="booked_date" type="date"
                                        placeholder="Enter Booking date" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                    @error('booked_date')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="" class="text-sm font-medium">Check In Date</label>
                                <div class="my-3">
                                    <input value="{{ old('check_in_date', $booking->check_in_date) }}" name="check_in_date" type="date"
                                        placeholder="Enter Check in date" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                    @error('check_in_date')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="" class="text-sm font-medium">Check Out Date</label>
                                <div class="my-3">
                                    <input value="{{ old('check_out_date', $booking->check_out_date) }}" name="check_out_date" type="date"
                                        placeholder="Enter Check out date" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                    @error('check_out_date')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="" class="text-sm font-medium">Notes</label>
                                <div class="my-3">
                                    <input value="{{ old('notes', $customer->notes) }}" name="notes" type="text"
                                        placeholder="Enter Email" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                    @error('notes')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                                <button
                                    class="bg-slate-700 hover:bg-slate-500 cursor-pointer text-sm rounded-md px-5 py-2 mt-4 text-white">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

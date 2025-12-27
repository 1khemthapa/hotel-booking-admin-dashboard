<x-hotel-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Package/Edit
            </h2>
            <a href="{{ route('hotelpackages.index') }}" class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('hotelpackages.update',$package->id) }}" method="POST">
                        @csrf
                        <div>
                            <label for="" class="text-sm font-medium">Package Name</label>
                            <div class="my-3">
                                <input value="{{ old('name', $package->package_name) }}" name="package_name" type="text"
                                    placeholder="Enter Name" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('name')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div>
                                <label for="" class="text-sm font-medium">Hotel</label>
                                <div class="my-3">
                                    <select class="cursor-pointer rounded-md w-1/2" name="hotel_id">
                                        <option value="">Select Hotel</option>
                                        @foreach ($hotels as $hotel){
                                            <option value="{{ $hotel->id }}">{{$hotel->name}}</option>
                                        }

                                        @endforeach

                                    </select>
                                </div>
                            </div> --}}

                            <div>
                                <label for="" class="text-sm font-medium">Price</label>
                                <div class="my-3">
                                    <input value="{{ old('name', $package->price) }}" name="price" type="text"
                                        placeholder="Enter Price" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                    @error('price')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <div>
                                <label>Status</label>
    <select name="status" required>
        <option value="active" {{ $package->status == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ $package->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
                                </div>


                            </div>
                                <button
                                    class="bg-slate-700 hover:bg-slate-500 cursor-pointer text-sm rounded-md px-5 py-2 mt-4 text-white">Update</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-hotel-layout>

<x-hotel-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Staff/Edit
            </h2>
            <a href="{{ route('hotelstaffs.index') }}" class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('hotelstaffs.update',$staff->id) }}" method="post">
                        @csrf
                        <div>
                            <label for="" class="text-sm font-medium">Name</label>
                            <div class="my-3">
                                <input value="{{ old('name', $staff->name) }}" name="name" type="text"
                                    placeholder="Enter Name" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('name')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="" class="text-sm font-medium">Email</label>
                                <div class="my-3">
                                    <input value="{{ old('name', $staff->email) }}" name="email" type="text"
                                        placeholder="Enter Email" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                    @error('email')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="" class="text-sm font-medium">Contact</label>
                                <div class="my-3">
                                    <input value="{{ old('contact', $staff->contact) }}" name="contact" type="text"
                                        placeholder="Enter contact" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                    @error('contact')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="" class="text-sm font-medium">Address</label>
                                <div class="my-3">
                                    <input value="{{ old('address', $staff->address) }}" name="address" type="text"
                                        placeholder="Enter address" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                    @error('address')
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
</x-hotel-layout>

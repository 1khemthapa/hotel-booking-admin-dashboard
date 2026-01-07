<x-staff-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users/Edit
            </h2>
            <a href="{{ route('staffcustomers.index') }}"
                class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('staffcustomers.update', $customer->id) }}" method="post">
                        @csrf
                        <div>
                            <div class="grid grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="" class="text-sm font-medium block">Name</label>

                                    <input value="{{ old('name', $customer->full_name) }}" name="full_name"
                                        type="text" placeholder="Enter Name"
                                        class="border-gray-300 shadow-sm w-full rounded-lg">
                                    @error('full_name')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="" class="text-sm font-medium block">Email</label>

                                    <input value="{{ old('name', $customer->email) }}" name="email" type="text"
                                        placeholder="Enter Email" class="border-gray-300 shadow-sm w-full rounded-lg">
                                    @error('email')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="" class="text-sm font-medium block">Contact</label>

                                    <input value="{{ old('name', $customer->contact) }}" name="contact" type="text"
                                        placeholder="Enter Email" class="border-gray-300 shadow-sm w-full rounded-lg">
                                    @error('contact')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="" class="text-sm font-medium block">Address</label>

                                    <input value="{{ old('name', $customer->address) }}" name="address" type="text"
                                        placeholder="Enter Email" class="border-gray-300 shadow-sm w-full rounded-lg">
                                    @error('contact')
                                        <p class="text-red-400 font-medium ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            <button
                                class="bg-slate-700 hover:bg-slate-500 cursor-pointer text-sm rounded-md px-3 py-2 w-full text-white">Update</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-staff-layout>

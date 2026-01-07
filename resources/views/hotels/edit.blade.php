<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Hotel/Edit
            </h2>
            <a href="{{ route('hotels.index') }}" class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('hotels.update',$hotel->id) }}" method="POST">
                        @csrf
                        <div >
                            <div class="grid grid-cols-2 gap-6 ">
                                <div >
                            <label for="" class="text-sm font-medium ">Name</label>
                                <input value="{{ old('name', $hotel->name) }}" name="name" type="text"
                                    placeholder="Enter Name" class="border-gray-300 shadow-sm  w-full rounded-lg">
                                @error('name')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="" class="text-sm font-medium">Email</label>
                                    <input value="{{ old('name', $hotel->email) }}" name="email" type="text"
                                        placeholder="Enter Email" class="border-gray-300 shadow-sm w-full rounded-lg">
                                    @error('email')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                            </div>
                            <div>
                                <label for="" class="text-sm font-medium">Contact</label>

                                    <input value="{{ old('name', $hotel->contact) }}" name="contact" type="text"
                                        placeholder="Enter Contact" class="border-gray-300 shadow-sm w-full rounded-lg">
                                    @error('contact')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror


                            </div>
                            <div>
                                <label for="" class="text-sm font-medium">Address</label>

                                    <input value="{{ old('name', $hotel->address) }}" name="address" type="text"
                                        placeholder="Enter Address" class="border-gray-300 shadow-sm w-full rounded-lg">
                                    @error('address')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror


                            </div>
                            <div>
                                <label for="" class="text-sm font-medium">Status</label>

                                    <select class="cursor-pointer rounded-md w-full" name="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">InActive</option>
                                    </select>


                            </div>
                            <div>
                                <label for="" class="text-sm font-medium">Remarks</label>

                                    <input  value="{{ old('name', $hotel->remarks) }}" rows="2" name="remarks" type="text"
                                        placeholder="Enter Remarks" class="border-gray-300 shadow-sm w-full rounded-lg "></input>
                                    @error('remarks')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                            </div>

                            </div>
                                <button
                                    class="bg-slate-700 hover:bg-slate-500 w-full cursor-pointer text-sm rounded-md px-5 py-2 mt-4 text-white">Update</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

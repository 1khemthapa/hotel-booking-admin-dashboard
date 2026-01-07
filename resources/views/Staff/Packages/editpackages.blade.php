<x-staff-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Package/Edit
            </h2>
            <a href="{{ route('staffpackages.index') }}"
                class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('staffpackages.update', $package->id) }}" method="POST">
                        @csrf
                        <div>
                            <div class="grid grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="" class="text-sm font-medium block">Package Name</label>

                                    <input value="{{ old('name', $package->package_name) }}" name="package_name"
                                        type="text" placeholder="Enter Name"
                                        class="border-gray-300 shadow-sm w-full rounded-lg">
                                    @error('name')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div>
                                    <label for="" class="text-sm font-medium block">Price</label>

                                    <input value="{{ old('name', $package->price) }}" name="price" type="text"
                                        placeholder="Enter Price" class="border-gray-300 shadow-sm w-full rounded-lg">
                                    @error('price')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div>
                                    <label for="" class="text-sm font-medium block">Status</label>
                                    <select name="status"
                                        class="border-gray-300 shadow-sm w-full rounded-lg cursor-pointer" required>
                                        <option value="active" {{ $package->status == 'active' ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="inactive" {{ $package->status == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <button
                                class="w-full bg-slate-700 hover:bg-slate-500 cursor-pointer text-sm rounded-md px-5 py-2 mt-4 text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-staff-layout>

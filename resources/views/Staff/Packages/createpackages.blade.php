<x-staff-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Packages
            </h2>
            <a href="{{ route('staffpackages.index') }}"
                class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Back</a>
        </div>
    </x-slot>
    <form action="{{ route('staffpackages.store') }}" method="POST"
        class="max-w-full m-8 mt-12 bg-white p-6 rounded-lg shadow">
        @csrf
        <div>
            <div class="grid grid-cols-2 gap-6 mb-6">

                <div>
                    <label class="block text-sm font-medium ">
                        Package Name
                    </label>
                    <input type="text" name="package_name" placeholder="Enter package name"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm ">
                </div>

                <div>
                    <label class="block text-sm font-medium">
                        Status
                    </label>
                    <select name="status"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm cursor-pointer">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>


                <div>
                    <label class="block text-sm font-medium ">
                        Price
                    </label>
                    <input type="number" name="price" id="price"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>
            </div>
            <button type="submit" class="w-full bg-blue-700 text-white py-2 rounded-md hover:bg-blue-500">
                Save
            </button>
        </div>
    </form>


</x-staff-layout>

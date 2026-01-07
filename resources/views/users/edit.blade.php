<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users/Edit
            </h2>
            <a href="{{ route('users.index') }}" class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('users.update', $user->id) }}" method="post">
                        @csrf
                        <div>
                            <label for="" class="text-sm font-medium">Name</label>
                            <div class="my-3">
                                <input value="{{ old('name', $user->name) }}" name="name" type="text"
                                    placeholder="Enter Name" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('name')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="" class="text-sm font-medium">Email</label>
                                <div class="my-3">
                                    <input value="{{ old('name', $user->email) }}" name="email" type="text"
                                        placeholder="Enter Email" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                    @error('email')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="mt-3">
    <label for="role" class="block mb-1 font-medium">
        Role
    </label>

    <select
        name="roles"
        id="roles"
        class=" rounded border-gray-300 cursor-pointer focus:border-indigo-500 focus:ring-indigo-500"
    >
        <option value="">Select role</option>

        @foreach ($roles as $role)
            <option
                value="{{ $role->name }}"
                {{ isset($user) && $user->hasRole($role->name) ? 'selected' : '' }}
            >
                {{ $role->display_name }}
            </option>
        @endforeach
    </select>
</div>


                                <button
                                    class="bg-slate-700 hover:bg-slate-500 cursor-pointer text-sm rounded-md px-5 py-2 mt-4 text-white">Update</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

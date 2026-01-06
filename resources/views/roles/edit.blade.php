<x-app-layout>
    <x-slot name="header">
         <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         Roles/Edit
        </h2>
        <a href="{{ route('roles.index') }}" class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('roles.update',$role->id) }}" method="post">
                        @csrf
                        <div>
                            <label for="" class="text-sm font-medium">Name</label>
                            <div class="my-3">
                            <input  value="{{ old('display_name',$role->display_name) }}" name="display_name" type="text" placeholder="Enter Name" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                            @error('display_name')
                                <p class="text-red-400 font-medium">{{ $message }}</p>

                            @enderror
                            </div>
                           <div class="grid grid-cols-4 ">
                            @if ($permissions->isNotEmpty())
                            @foreach ($permissions as $permission )
                             <div class="mt-3">
                            <input {{ ($haspermissions->contains($permission->name)) ? 'checked':'' }} type="checkbox" id="permission-{{ $permission->id }}" class="rounded cursor-pointer" name="permission[]" value="{{ $permission->name }}">
                            <label class="cursor-pointer" for="permission-{{ $permission->id }}">{{ $permission->display_name }}</label>
                        </div>
                           @endforeach
                           @endif
                         </div>
                        <button class="bg-slate-700 hover:bg-slate-500 cursor-pointer text-sm rounded-md px-5 py-2 mt-4 text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

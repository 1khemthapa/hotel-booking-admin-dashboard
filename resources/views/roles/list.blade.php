<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
        @can ('create-role')
        <a href="{{ route('roles.create') }}" class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Create Role</a>
        </div>
        @endcan
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <x-message></x-message>
             <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th class="px-6 py-2 rounded-md text-left">#</th>
                        <th class="px-6 py-2 rounded-md text-left">Name</th>
                        <th class="px-6 py-2 rounded-md text-left">Permissions</th>
                        <th class="px-6 py-2 rounded-md text-left">Created</th>
                        <th class="px-6 py-2 rounded-md text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if ($roles->isNotEmpty())
                    @foreach ($roles as $idx => $role)

                    <tr class="border-b">
                        <td class="px-6 py-2 text-left ">{{$roles->firstItem() + $idx}}</td>
                        <td class="px-6 py-2 text-left ">{{$role->display_name}}</td>
                        <td  class="px-6 py-2 text-left ">{{$role->permissions->pluck('display_name')->implode(', ')}}</td>
                        <td class="px-6 py-2 text-left">
                           {{ \Carbon\Carbon::parse($role->created_at)->format('d M,Y')}}
                        </td>
                        @can ('edit-role')
                        <td class="px-6 py-2   flex ">
                            <a href="{{ route('roles.edit',$role->id) }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>
                            @endcan
                            @can ('delete-role')
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" >
    @csrf
    @method('DELETE')

    <button type="submit" onclick="return confirm('Are you sure you want to delete');"
        class="bg-red-700 text-sm rounded-md text-white px-3 py-2 ml-2 hover:bg-red-600">
        Delete
    </button>
</form>
@endcan
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <div class="my-3">

                {{ $roles->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

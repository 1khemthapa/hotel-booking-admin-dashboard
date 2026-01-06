<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions') }}
        </h2>
        @can ('create-permission')
        <a href="{{ route('permissions.create') }}" class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Create Permission</a>
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
                        <th class="px-6 py-2 rounded-md text-left">Created</th>
                        <th class="px-6 py-2 rounded-md text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if($permissions->isNotEmpty())
                    @foreach ($permissions as $idx => $permission)


                    <tr class="border-b">

                        {{-- <td class="px-6 py-2 text-left ">{{ $permissions->firstItem() + $idx }}</td> --}}
                        <td class="px-6 py-2 text-left ">{{ $permissions->firstItem() + $idx }}</td>
                        <td class="px-6 py-2 text-left ">{{$permission->display_name}}</td>
                        <td class="px-6 py-2 text-left w-180">
                           {{ \Carbon\Carbon::parse($permission->created_at)->format('d M,Y')}}
                        </td>
                        @can ('edit-permission')
                        <td class="px-6 py-2  w-180 flex items-center justify-center ">
                            <a href="{{ route('permissions.edit',$permission->id) }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>
                            @endcan
                            @can ('delete-permission')
                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" >
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

                {{ $permissions->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

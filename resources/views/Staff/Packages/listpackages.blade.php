<x-staff-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Package') }}
        </h2>
        @can('create-package')

        <a href="{{ route('staffpackages.create') }}" class="bg-slate-700 text-sm rounded-md px-3 h-10 text-white">Add Package</a>
        @endcan
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <x-message></x-message>
             <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th class="px-6 py-2 rounded-md text-left">#</th>
                        <th class="px-6 py-2 rounded-md text-left">Name</th>
                        <th class="px-6 py-2 rounded-md text-left">Status</th>
                        <th class="px-6 py-2 rounded-md text-left">Price</th>
                        <th class="px-6 py-2 rounded-md text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if ($packages->isNotEmpty())
                    @foreach ($packages as $idx => $package)

                    <tr class="border-b">
                        <td class="px-6 py-2 text-left w-10">{{$idx+1}}</td>
                        <td class="px-6 py-2 text-left ">{{$package->package_name}}</td>
                        <td  class="px-6 py-2 text-left">{{$package->status}}</td>
                        <td  class="px-6 py-2 text-left">{{$package->price}}</td>

                        <td class="px-6 py-2 flex items-center  justify-center">
                            @can('edit-package')

                            <a href="{{ route('staffpackages.edit',$package->id) }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>
                            @endcan

                            <form action="{{ route('staffpackages.destroy', $package->id) }}" method="POST" >
    @csrf
    @method('DELETE')
        @can('delete-package')

        <button type="submit" onclick="return confirm('Are you sure you want to delete');"
        class="bg-red-700 text-sm inline-block rounded-md text-white px-3 py-2 ml-2 hover:bg-red-600">
        Delete
    </button>
    @endcan
</form>

                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <div class="my-3">

                {{ $packages->links() }}
            </div>
        </div>
    </div>
</x-staff-layout>

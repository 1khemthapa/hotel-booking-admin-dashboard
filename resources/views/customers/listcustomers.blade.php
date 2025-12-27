{{-- <x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
        </h2>
        @can ('create customers')
        <a href="{{ route('customers.create') }}" class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Add Customer</a>
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
                        <th class="px-6 py-2 rounded-md text-left">Contact</th>
                        <th class="px-6 py-2 rounded-md text-left">Email</th>
                        <th class="px-6 py-2 rounded-md text-left">Address</th>
                        <th class="px-6 py-2 rounded-md text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if ($customers->isNotEmpty())
                    @foreach ($customers as $idx => $customer)

                    <tr class="border-b">
                        <td class="px-6 py-2 text-left w-10">{{$customers->firstItem()+$idx}}</td>
                        <td class="px-6 py-2 text-left ">{{$customer->full_name}}</td>
                        <td  class="px-6 py-2 text-left">{{$customer->contact}}</td>
                        <td  class="px-6 py-2 text-left">{{$customer->email}}</td>
                        <td  class="px-6 py-2 text-left">{{$customer->address}}</td>

                        @can ('edit customers')
                        <td class="px-6 py-2 flex items-center  justify-center">
                            <a href="{{ route('customers.edit',$customer->id) }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>
                            @endcan
                            @can ('delete customers')
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" >
    @csrf
    @method('DELETE')

    <button type="submit" onclick="return confirm('Are you sure you want to delete');"
        class="bg-red-700 text-sm inline-block rounded-md text-white px-3 py-2 ml-2 hover:bg-red-600">
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

                {{ $customers->links() }}
            </div>
        </div>
    </div>
</x-app-layout> --}}

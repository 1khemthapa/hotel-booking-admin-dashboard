{{-- <x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking') }}
        </h2>
        @can ('create bookings')
        <a href="{{ route('bookings.create') }}" class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Add Booking</a>
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
                        <th class="px-6 py-2 rounded-md text-left">Customer Name</th>
                        <th class="px-6 py-2 rounded-md text-left">Hotel Name</th>
                        <th class="px-6 py-2 rounded-md text-left">Package Name</th>
                        <th class="px-6 py-2 rounded-md text-left">Book-In</th>
                        <th class="px-6 py-2 rounded-md text-left">Check-In</th>
                        <th class="px-6 py-2 rounded-md text-left">Check-Out</th>
                        <th class="px-6 py-2 rounded-md text-center">pax</th>
                        <th class="px-6 py-2 rounded-md text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if ($bookings->isNotEmpty())
                    @foreach ($bookings as $idx=> $booking)

                    <tr class="border-b">
                        <td class="px-6 py-2 text-left w-10">{{$bookings->firstItem()+$idx}}</td>
                        <td class="px-6 py-2 text-left w-10">{{$booking->customer?->full_name}}{{$booking->customer_name}}</td>
                        <td  class="px-6 py-2 text-left">{{$booking->package?->hotel?->name}}</td>
                        <td class="px-6 py-2 text-left ">{{$booking->package?->package_name}}</td>
                        <td  class="px-6 py-2 text-left">{{$booking->booked_date}}</td>
                        <td  class="px-6 py-2 text-left">{{$booking->check_in_date}}</td>
                        <td  class="px-6 py-2 text-left">{{$booking->check_out_date}}</td>
                        <td  class="px-6 py-2 text-left">{{$booking->pax}}</td>

                        @can ('edit bookings')
                        <td class="px-6 py-2 flex items-center  justify-center">
                            <a href="{{ route('bookings.edit',$booking->id) }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>
                            @endcan
                            @can ('delete bookings')
                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" >
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

                {{ $bookings->links() }}
            </div>
        </div>
    </div>
</x-app-layout> --}}

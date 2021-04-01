<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ \Illuminate\Foundation\Inspiring::quote() }}
                </div>

                @foreach ($hardcopies ?? [] as $hardcopy)
                    <div class="mt-4">
                        <b>Material ID: </b>{{ $hardcopy->material_id }}<br>
                        <b>Taken: </b>{{ $hardcopy->taken }}<br>
                        <b>Deadline: </b>{{ $hardcopy->deadline }}<br>
                        @if ($hardcopy->return)
                        <b>Returned: </b>{{ $hardcopy->return }}<br>
                        @else
                        <form class="p-3" action="{{ route('hardcopy.return', $hardcopy) }}" method="post">
                            @csrf
                            <input class="p-2" type="submit" value="Mark returned">
                        </form>
                        @endif  
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>

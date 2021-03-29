<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ \Illuminate\Foundation\Inspiring::quote() }}
                </div>
            </div>
            @foreach ($materials ?? [] as $material)
                <div class="mt-4">
                    <b>Name: </b>{{ $material->name }}<br>
                    <b>Type: </b>{{ $material->type->name }}<br>
                    <b>Category: </b>{{ $material->category->name }}<br>
                    <b>Amount: </b>{{ $material->amount }}<br>
                    @if ($material->approved())
                        <b>Link to material: </b>{{ $material->link_to_material }}<br>
                    @endif
                    @if (!$material->requestedByUser())
                    <form action="{{ route('store.request', $material) }}" method="post">
                        @csrf
                        <input class="p-2" type="submit" value="Request Access">
                    </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

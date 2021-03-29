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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('materials.filter') }}" method="post">
                        @csrf
                        <select name="category" id="category">
                            <option value="">Select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <select name="type" id="type">
                            <option value="">Select type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ old('type') == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}</option>
                            @endforeach
                        </select>
                        <select name="addition_date" id="addition_date">
                            <option value="">Select addition date</option>
                            @foreach ($materials as $material)
                                <option value="{{ $material->created_at }}"
                                    {{ old('material->created_at') == $material->created_at ? 'selected' : '' }}>
                                    {{ $material->created_at }}</option>
                            @endforeach
                        </select>
                        <input class="p-2" type="submit" value="Filter">
                    </form>
                </div>
            </div>

            @forelse ($materials as $material)
                <div class="mt-4">
                    <b>Name: </b>{{ $material->name }}<br>
                    <b>Type: </b>{{ $material->type->name }}<br>
                    <b>Category: </b>{{ $material->category->name }}<br>
                    <b>Amount: </b>{{ $material->amount }}<br>
                    @if ($material->approved())
                        <a target="_blank" href="{{ '//' . $material->link_to_material }}"><b>Link to
                                material</b></a><br>
                    @endif
                    @if (!$material->requestedByUser())
                        <form action="{{ route('store.request', $material) }}" method="post">
                            @csrf
                            <input class="p-2" type="submit" value="Request Access">
                        </form>
                    @endif
                </div>
            @empty
                <h2>No materials found</h2>
            @endforelse
        </div>
    </div>
</x-app-layout>

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
                <div class="p-6 bg-white border-b border-gray-200 mt-4">
                    <form action="{{ route('admin.dashboard') }}" method="POST">
                        @csrf
                        <h3>Register Material</h3>
                        <div class="mt-4">
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="type_id" :value="__('Type')" />
                            <select name="type_id" id="type_id">
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" {{ (old("type_id") == $type->id ? "selected":"") }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4">
                            <x-label for="category_id" :value="__('Category')" />

                            <select name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ (old("category_id") == $category->id ? "selected":"") }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4">
                            <x-label for="amount" :value="__('Amount')" />

                            <x-input id="amount" class="block mt-1 w-full" type="text" name="amount"
                                :value="old('amount')" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="link_to_material" :value="__('Link to material')" />

                            <x-input id="link_to_material" class="block mt-1 w-full" type="text" name="link_to_material"
                                :value="old('link_to_material')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-input class="block mt-1 w-full p-6" type="submit" name="submit"
                                value="Add material" required autofocus />
                        </div>
                    </form>
                </div>

                @foreach ($materials ?? [] as $material)
                    <div class="mt-4">
                        <b>Name: </b>{{ $material->name }}<br>
                        <b>Type: </b>{{ $material->type->name }}<br>
                        <b>Category: </b>{{ $material->category->name }}<br>
                        <b>Amount: </b>{{ $material->amount }}<br>
                        <b>Link to material: </b>{{ $material->link_to_material }}
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>

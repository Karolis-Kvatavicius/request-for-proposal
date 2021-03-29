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
            @foreach ($materials_requests ?? [] as $req)
                <div class="mt-4">
                    <b>User: </b>{{ $req->user->name }}<br>
                    <b>Material: </b>{{ $req->material->name }}<br>
                    <b>Status: </b>{{ $req->status }}<br>
                    {{-- {{dd($req)}} --}}
                    <form action="{{ route('admin.request.update', $req) }}" method="post">
                        @csrf
                        <input class="p-2" type="submit" name="grant" value="Grant Access">
                        <input class="p-2" type="submit" name="deny" value="Deny Access">
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

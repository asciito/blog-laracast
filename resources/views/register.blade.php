@extends('layout')

@section('content')

<main class="mt-10 w-96 mx-auto">
    <form action="/register" method="POST" class="space-y-4 bg-gray-100 py-8 px-6 rounded-lg">
        @csrf

        <div>
            <label for="name" class="block text-lg">Name</label>
            <input id="name" type="text" name="name" class="border border-200-gray w-full py-1 px-2" value="{{ old('name') }}"/>
            @error('name')
                <p class="text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="username" class="block text-lg">Username</label>
            <input id="username" type="text" name="username" class="border border-200-gray w-full py-1 px-2" value="{{ old('username') }}" />
            @error('username')
            <p class="text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-lg">Email</label>
            <input id="email" type="email" name="email" class="border border-200-gray w-full py-1 px-2" value="{{ old('email') }}"/>
            @error('email')
                <p class="text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-lg">Password</label>
            <input id="password" type="password" name="password" class="border border-200-gray w-full py-1 px-2" />
            @error('password')
                <p class="text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <input type="submit" class="bg-blue-500 hover:bg-blue-600 cursor-pointer text-white text-xl py-2 px-6 rounded-full" value="Register">
    </form>
</main>
@endsection

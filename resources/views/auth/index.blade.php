<x-layout>
    <main class="mt-10 w-96 mx-auto">
        <x-panel>
            <h1 class="text-center font-bold text-xl">Log In!</h1>

            <form action="/login" method="POST" class="mt-10 space-y-4">
                @csrf

                <x-form.input name="email" type="email" autocomplete="email"></x-form.input>

                <x-form.input name="password" type="password" autocomplete="username"></x-form.input>

                <x-form.button>Log In</x-form.button>
            </form>
        </x-panel>
    </main>
</x-layout>

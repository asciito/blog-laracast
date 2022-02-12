<x-layout>
    <main class="mt-10 w-96 mx-auto">
        <x-panel>
            <h1 class="text-center font-bold text-xl">Register Now!</h1>

            <form action="/register" method="POST" class="space-y-4 mt-10">
                @csrf

                <x-form.input name="name"></x-form.input>
                <x-form.input name="username"></x-form.input>
                <x-form.input name="email"></x-form.input>
                <x-form.input name="password"></x-form.input>

                <x-form.button>Register</x-form.button>
            </form>
        </x-panel>
    </main>
</x-layout>

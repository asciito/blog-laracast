<x-form.field>
    <x-form.label :for="$name">{{ ucwords($name) }}</x-form.label>

    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        class="border border-gray-200 focus:outline-none focus:ring focus:ring-blue-300 py-1 px-2 rounded">{{ $slot }}</textarea>

    <x-form.error :name="$name"/>
</x-form.field>

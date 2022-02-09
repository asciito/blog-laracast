@props(['name', 'type' => 'text'])

<x-form.field>
    <x-form.label :for="$name">{{ ucwords($name) }}</x-form.label>

    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name) }}"
        class="border border-gray-300 focus:outline-none focus:ring focus:ring-blue-300 py-1 px-2">

    <x-form.error :name="$name"/>
</x-form.field>

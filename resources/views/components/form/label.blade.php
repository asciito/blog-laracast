@props(['for'])

<label for="{{ $for }}" class="mb-1 text-bold uppercase">
    {{ $slot }}
</label>

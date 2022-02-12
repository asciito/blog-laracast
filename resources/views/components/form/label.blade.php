@props(['for'])

<label for="{{ $for }}" class="mb-1 font-bold uppercase">
    {{ $slot }}
</label>

@props(['name'])

@error($name)
    <span class="text-sm text-red-400">{{ $message }}</span>
@enderror

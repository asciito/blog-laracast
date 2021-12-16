@if (session()->has('success'))
    <p
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="fixed bg-blue-500 text-sm text-white py-2 px-3 bottom-3 right-3 rounded-xl">{{ session('success') }}</p>
@endif

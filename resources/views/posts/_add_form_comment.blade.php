<x-panel class="p-6">
    @auth()
        <form method="POST" action="{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/100?u={{ Auth::id() }}" class="rounded-full mr-4" width="50" height="50" alt="">
                <h2>Want to participate?</h2>
            </header>

            <textarea
                name="body"
                rows="5"
                class="focus:outline-none focus:ring mt-4 w-full"
                placeholder="Quick, think in something to say!"></textarea>

            @error('body')
                <span class="text-xs text-red-400">{{ $message }}</span>
            @enderror

            <div class="flex justify-end border-t border-gray-200 mt-6 pt-6">
                <x-submit-button>Post</x-submit-button>
            </div>
        </form>
    @else
        <p class="font-bold">
            <a href="/register" class="hover:underline text-blue-400">Register</a>
            or
            <a href="/login" class="hover:underline text-blue-400">log in </a> to give a comment
        </p>
    @endauth
</x-panel>

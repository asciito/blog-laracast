@props(['comment'])

<x-panel class="border border-gray-50 bg-gray-50 p-6">
    <article class="flex  space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/100?u={{ $comment->author->id }}" width="60" height="60" alt="Profile Avatar" class="rounded-xl">
        </div>

        <div>
            <header>
                <h3 class="font-bold">{{ $comment->author->name }}</h3>

                <p class="text-xs">
                    Posted
                    <time>{{ $comment->created_at->diffForHumans() }}</time>
                </p>
            </header>

            <p class="mt-2">
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-panel>

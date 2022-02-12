<x-layout>
    <x-setting heading="Edit Post">
        <!-- DON'T FORGET TO USE: MULTIPAT/FORM-DATA WHEN YOU'RE UPLOADING FILES -->
        <form method="POST" action="/admin/posts/{{ $post->slug }}" class="space-y-4" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <x-form.input name="title" value="{{ old('title', $post->title) }}"/>
            <x-form.input name="slug" value="{{ old('slug', $post->slug) }}"/>
            <x-form.input name="thumbnail" type="file"/>
            <x-form.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body">{{ old('body', $post->body) }}</x-form.textarea>

            <x-form.field>
                <x-form.label for="category_id">Categories</x-form.label>
                <select
                    name="category_id"
                    id="category_id"
                    class="border border-gray-300 focus:outline-none focus:ring focus:ring-blue-300 py-1 px-2"
                    value
                >
                    <option disabled selected>Default</option>

                    @foreach(\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}" {{ $category->id == old('category_id', $post->category->id) ? 'selected' : ''}}>{{ $category->name }}</option>
                    @endforeach

                </select>

                @error('category_id')
                <span class="text-sm text-red-400">{{ $message }}</span>
                @enderror
            </x-form.field>

            <div>
                <x-form.button>Save post</x-form.button>
            </div>
        </form>
    </x-setting>
</x-layout>

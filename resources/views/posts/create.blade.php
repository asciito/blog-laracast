@extends('layout')

@section('content')
    <x-panel class="max-w-sm mx-auto p-6">
        <!-- DON'T FORGET TO USE: MULTIPAT/FORM-DATA WHEN YOU'RE UPLOADING FILES -->
        <form method="POST" action="/admin/posts" class="space-y-4" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title"/>
            <x-form.input name="slug"/>
            <x-form.input name="thumbnail" type="file"/>
            <x-form.textarea name="excerpt"/>
            <x-form.textarea name="body"/>

            <x-form.field>
                <x-form.label for="category_id">Categories</x-form.label>
                <select
                    name="category_id"
                    id="category_id"
                    class="border border-gray-300 focus:outline-none focus:ring focus:ring-blue-300 py-1 px-2"
                >
                    <option disabled selected>Default</option>

                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : ''}}>{{ $category->name }}</option>
                    @endforeach

                </select>

                @error('category_id')
                    <span class="text-sm text-red-400">{{ $message }}</span>
                @enderror
            </x-form.field>

            <div>
                <x-submit-button>Save post</x-submit-button>
            </div>
        </form>
    </x-panel>
@endsection

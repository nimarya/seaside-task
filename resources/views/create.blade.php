@extends('layouts.app')

@section('content')
    
<div>
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf

        <select class="ml-4 mb-4" name="category_id" id="category_id">
            @foreach (App\Models\Category::all() as $category)
                <option 
                    value="{{ $category->id; }}"
                    {{ old('category_id') == $category->id ? 'selected' : ''; }}
                    >{{ ucwords($category->name); }}</option>
            @endforeach
        </select>

        <div class="sm:max-w-xs mb-4 ml-4">
            <x-input-label for="cover" :value="__('Cover')" />
            <x-text-input id="cover" class="block mt-1 w-full" type="file" name="cover" required  />
            <x-input-error :messages="$errors->get('cover')" class="mt-2" />
        </div>

        <div class="sm:max-w-xs mb-4 ml-4">
            <x-input-label for="images" :value="__('Image')" />
            <x-text-input id="images" class="block mt-1 w-full" type="file" name="images" required  />
            <x-input-error :messages="$errors->get('images')" class="mt-2" />
        </div>

        <div class="sm:max-w-xs mb-4 ml-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required  />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="sm:max-w-xs mb-4 ml-4">
            <x-input-label for="cost" :value="__('Cost')" />
            <x-text-input id="cost" class="block mt-1 w-full" type="number" name="cost" required  />
            <x-input-error :messages="$errors->get('cost')" class="mt-2" />
        </div>

        <div class="mb-4 ml-4">
            <x-input-label for="description" :value="__('Description')" />
            <textarea name="description" id="description" cols="54" rows="10" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="sm:max-w-xs mb-4 ml-4">
            <x-input-label for="size" :value="__('Size')" />
            <x-text-input id="size" class="block mt-1 w-full" type="text" name="size" required  />
            <x-input-error :messages="$errors->get('size')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end m-4">
            <x-primary-button class="ml-3">
                {{ __('Добавить') }}
            </x-primary-button>
        </div>

    </form>
</div>
@endsection

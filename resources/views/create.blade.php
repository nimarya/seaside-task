@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg bg-opacity-90">
                <div class="p-6 text-gray-900">
                    <div class="w-full sm:max-w-xxl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                        <form method="POST" action="{{ route('products.store') }}">
                            @csrf
                
                            <div class="sm:max-w-xs mb-4">
                                <x-input-label for="number" :value="__('Номер журнала')" />
                                <x-text-input id="number" class="block mt-1 w-full" type="text" name="number" required  />
                                <x-input-error :messages="$errors->get('number')" class="mt-2" />
                            </div>

                            <div class="sm:max-w-xs mb-4">
                                <x-input-label for="year" :value="__('Год выпуска')" />
                                <x-text-input id="year" class="block mt-1 w-full" type="text" name="year" required  />
                                <x-input-error :messages="$errors->get('year')" class="mt-2" />
                            </div>

                            <div class=" mb-4">
                                <x-input-label for="body" :value="__('Содержание')" />
                                <textarea name="body" id="body" cols="54" rows="10" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                                <x-input-error :messages="$errors->get('body')" class="mt-2" />
                            </div>
                
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ml-3">
                                    {{ __('Добавить') }}
                                </x-primary-button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

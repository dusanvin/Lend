<!-- resources/views/devices/create.blade.php -->
@extends('layouts.app')

@section('title', 'Gerät hinzufügen')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Gerät hinzufügen</h1>
        <p class="mb-8 flex items-center text-sm">Füge dem System ein neues Gerät hinzu.
            <a href="{{ route('devices.index') }}" class="hover:underline text-yellow-700 flex items-center pl-1">
                Du möchtest zur Geräteübersicht? Folge mir!
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" height="18" width="18" class="ml-1">
                    <path fill-rule="evenodd" d="M19.902 4.098a3.75 3.75 0 0 0-5.304 0l-4.5 4.5a3.75 3.75 0 0 0 1.035 6.037.75.75 0 0 1-.646 1.353 5.25 5.25 0 0 1-1.449-8.45l4.5-4.5a5.25 5.25 0 1 1 7.424 7.424l-1.757 1.757a.75.75 0 1 1-1.06-1.06l1.757-1.757a3.75 3.75 0 0 0 0-5.304Zm-7.389 4.267a.75.75 0 0 1 1-.353 5.25 5.25 0 0 1 1.449 8.45l-4.5 4.5a5.25 5.25 0 1 1-7.424-7.424l1.757-1.757a.75.75 0 1 1 1.06 1.06l-1.757 1.757a3.75 3.75 0 1 0 5.304 5.304l4.5-4.5a3.75 3.75 0 0 0-1.035-6.037.75.75 0 0 1-.354-1Z" clip-rule="evenodd" />
                </svg>
            </a>
        </p>
        @if ($errors->any())
            <div class="bg-red-500 text-white p-2 mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('devices.store') }}" method="POST" enctype="multipart/form-data" class="w-full">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Name & Label (z.B. <em>Nikon ZX3 #1</em>):</label>
                <input type="text" name="title" id="title" class="bg-gray-50 focus:ring-gray-500 focus:border-gray-500 border-gray-300 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" value="{{ old('title') }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Aufbewahrungsort (Schranknummer/Fach, z.B. <em>1/F, Zwischenschrank (ZW)</em>):</label>
                <textarea rows="4" name="description" id="description" class="bg-gray-50 focus:ring-gray-500 focus:border-gray-500 appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Bild:</label>
                <input type="file" name="image" id="image" class="appearance-none rounded w-full py-2 px-0 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="group" class="block text-gray-700 text-sm font-bold mb-2">Kategorie:</label>
                <select name="group" id="group" class="bg-gray-50 focus:ring-gray-500 focus:border-gray-500 border-gray-300 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" required>
                    <option value="Stativ">Stativ</option>
                    <option value="Kamera">Kamera</option>
                    <option value="VR-/AR-Brille">VR-/AR-Brille</option>
                    <option value="Mikrofon">Mikrofon</option>
                    <option value="Videokonferenzsystem">Videokonferenzsystem</option>
                    <option value="Koffer">Koffer</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Tablet">Tablet</option>
                </select>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-gray-600 hover:bg-gray-800 border-gray-300 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Gerät hinzufügen</button>
            </div>
        </form>
    </div>
@endsection

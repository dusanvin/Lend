@extends('layouts.app')

@section('title', 'Geräteübersicht')

@section('content')
<h1 class="text-2xl font-bold mb-4">Geräte</h1>
<p class="flex items-center text-sm">Eine Übersicht über alle Geräte. Möchtest du ein <span class="font-semibold mx-1">Gerät verleihen oder zurückgeben?</span> Klicke in der entsprechenden Spalte auf den Button <span class="mx-1 bg-blackshadow-md bg-gray-100 text-gray-800 font-bold py-2 px-4 rounded">Verleihen</span> oder <span class="mx-1 shadow-md bg-gray-900 hover:bg-black text-white font-bold py-2 px-4 rounded">Zurückgeben</span><p>
<p class="mb-8 flex items-center text-sm">
    <a href="{{ route('devices.create') }}" class="hover:underline text-yellow-700 flex items-center">
    Du möchtest dem System ein Gerät hinzufügen? Folge mir!
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" height="18" width="18" class="ml-1">
            <path fill-rule="evenodd" d="M19.902 4.098a3.75 3.75 0 0 0-5.304 0l-4.5 4.5a3.75 3.75 0 0 0 1.035 6.037.75.75 0 0 1-.646 1.353 5.25 5.25 0 0 1-1.449-8.45l4.5-4.5a5.25 5.25 0 1 1 7.424 7.424l-1.757 1.757a.75.75 0 1 1-1.06-1.06l1.757-1.757a3.75 3.75 0 0 0 0-5.304Zm-7.389 4.267a.75.75 0 0 1 1-.353 5.25 5.25 0 0 1 1.449 8.45l-4.5 4.5a5.25 5.25 0 1 1-7.424-7.424l1.757-1.757a.75.75 0 1 1 1.06 1.06l-1.757 1.757a3.75 3.75 0 1 0 5.304 5.304l4.5-4.5a3.75 3.75 0 0 0-1.035-6.037.75.75 0 0 1-.354-1Z" clip-rule="evenodd" />
        </svg>
    </a>
</p>
@if(session('status'))
<div class="bg-green-400 text-white p-4 font-semibold mb-4 rounded" style="display: block !important;">
    {{ session('status') }}
</div>
@endif

<!-- Tabs for categories -->
<div class="container mx-auto flex items-center">
    <button id="tab-" onclick="filterDevices('')" class="tab-button rounded-t p-4 text-sm mr-2 flex items-center bg-gray-600 text-white flex items-center">
        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-3">
            <path fill-rule="evenodd" d="M1.5 9.832v1.793c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875V9.832a3 3 0 0 0-.722-1.952l-3.285-3.832A3 3 0 0 0 16.215 3h-8.43a3 3 0 0 0-2.278 1.048L2.222 7.88A3 3 0 0 0 1.5 9.832ZM7.785 4.5a1.5 1.5 0 0 0-1.139.524L3.881 8.25h3.165a3 3 0 0 1 2.496 1.336l.164.246a1.5 1.5 0 0 0 1.248.668h2.092a1.5 1.5 0 0 0 1.248-.668l.164-.246a3 3 0 0 1 2.496-1.336h3.165l-2.765-3.226a1.5 1.5 0 0 0-1.139-.524h-8.43Z" clip-rule="evenodd"></path>
            <path d="M2.813 15c-.725 0-1.313.588-1.313 1.313V18a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-1.688c0-.724-.588-1.312-1.313-1.312h-4.233a3 3 0 0 0-2.496 1.336l-.164.246a1.5 1.5 0 0 1-1.248.668h-2.092a1.5 1.5 0 0 1-1.248-.668l-.164-.246A3 3 0 0 0 7.046 15H2.812Z"></path>
        </svg>
        Alle
    </button>
    <button id="tab-Stativ" onclick="filterDevices('Stativ')" class="tab-button rounded-t p-4 text-sm mr-2 flex items-center hover:text-black text-gray-700 bg-gray-200">
        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-3">
            <path fill-rule="evenodd" d="M2.25 4.125c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875V17.25a4.5 4.5 0 1 1-9 0V4.125Zm4.5 14.25a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z" clip-rule="evenodd" />
            <path d="M10.719 21.75h9.156c1.036 0 1.875-.84 1.875-1.875v-5.25c0-1.036-.84-1.875-1.875-1.875h-.14l-8.742 8.743c-.09.089-.18.175-.274.257ZM12.738 17.625l6.474-6.474a1.875 1.875 0 0 0 0-2.651L15.5 4.787a1.875 1.875 0 0 0-2.651 0l-.1.099V17.25c0 .126-.003.251-.01.375Z" />
        </svg>     
        Stative
    </button>
    <button id="tab-Kamera" onclick="filterDevices('Kamera')" class="tab-button rounded-t p-4 text-sm mr-2 flex items-center hover:text-black text-gray-700 bg-gray-200">
        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-3">
            <path d="M12 9a3.75 3.75 0 1 0 0 7.5A3.75 3.75 0 0 0 12 9Z" />
            <path fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 0 1 5.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 0 1-3 3h-15a3 3 0 0 1-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 0 0 1.11-.71l.822-1.315a2.942 2.942 0 0 1 2.332-1.39ZM6.75 12.75a5.25 5.25 0 1 1 10.5 0 5.25 5.25 0 0 1-10.5 0Zm12-1.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
        </svg>           
        Kameras
    </button>
    <button id="tab-VRAR" onclick="filterDevices('VRAR')" class="tab-button rounded-t p-4 text-sm mr-2 flex items-center hover:text-black text-gray-700 bg-gray-200">
        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-3">
            <path fill-rule="evenodd" d="M1.5 7.125c0-1.036.84-1.875 1.875-1.875h6c1.036 0 1.875.84 1.875 1.875v3.75c0 1.036-.84 1.875-1.875 1.875h-6A1.875 1.875 0 0 1 1.5 10.875v-3.75Zm12 1.5c0-1.036.84-1.875 1.875-1.875h5.25c1.035 0 1.875.84 1.875 1.875v8.25c0 1.035-.84 1.875-1.875 1.875h-5.25a1.875 1.875 0 0 1-1.875-1.875v-8.25ZM3 16.125c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875v2.25c0 1.035-.84 1.875-1.875 1.875h-5.25A1.875 1.875 0 0 1 3 18.375v-2.25Z" clip-rule="evenodd" />
          </svg>              
        VR/AR
    </button>
    <button id="tab-Mikrofon" onclick="filterDevices('Mikrofon')" class="tab-button rounded-t p-4 text-sm mr-2 flex items-center hover:text-black text-gray-700 bg-gray-200">
        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-2">
            <path d="M8.25 4.5a3.75 3.75 0 1 1 7.5 0v8.25a3.75 3.75 0 1 1-7.5 0V4.5Z" />
            <path d="M6 10.5a.75.75 0 0 1 .75.75v1.5a5.25 5.25 0 1 0 10.5 0v-1.5a.75.75 0 0 1 1.5 0v1.5a6.751 6.751 0 0 1-6 6.709v2.291h3a.75.75 0 0 1 0 1.5h-7.5a.75.75 0 0 1 0-1.5h3v-2.291a6.751 6.751 0 0 1-6-6.709v-1.5A.75.75 0 0 1 6 10.5Z" />
        </svg>              
        Mikrofone
    </button>
    <button id="tab-Videokonferenzsystem" onclick="filterDevices('Videokonferenzsystem')" class="tab-button rounded-t p-4 text-sm mr-2 flex items-center hover:text-black text-gray-700 bg-gray-200">
        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-3">
            <path d="M4.5 4.5a3 3 0 0 0-3 3v9a3 3 0 0 0 3 3h8.25a3 3 0 0 0 3-3v-9a3 3 0 0 0-3-3H4.5ZM19.94 18.75l-2.69-2.69V7.94l2.69-2.69c.944-.945 2.56-.276 2.56 1.06v11.38c0 1.336-1.616 2.005-2.56 1.06Z" />
          </svg>
          Videokonf.</button>
    <button id="tab-Koffer" onclick="filterDevices('Koffer')" class="tab-button rounded-t p-4 text-sm mr-2 flex items-center hover:text-black text-gray-700 bg-gray-200">
        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-3">
            <path fill-rule="evenodd" d="M7.5 5.25a3 3 0 0 1 3-3h3a3 3 0 0 1 3 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0 1 12 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 0 1 7.5 5.455V5.25Zm7.5 0v.09a49.488 49.488 0 0 0-6 0v-.09a1.5 1.5 0 0 1 1.5-1.5h3a1.5 1.5 0 0 1 1.5 1.5Zm-3 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
            <path d="M3 18.4v-2.796a4.3 4.3 0 0 0 .713.31A26.226 26.226 0 0 0 12 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 0 1-6.477-.427C4.047 21.128 3 19.852 3 18.4Z" />
          </svg>
          Koffer
    </button>
    <button id="tab-Laptop" onclick="filterDevices('Laptop')" class="tab-button rounded-t p-4 text-sm mr-2 flex items-center hover:text-black text-gray-700 bg-gray-200">
        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-3">
            <path fill-rule="evenodd" d="M2.25 5.25a3 3 0 0 1 3-3h13.5a3 3 0 0 1 3 3V15a3 3 0 0 1-3 3h-3v.257c0 .597.237 1.17.659 1.591l.621.622a.75.75 0 0 1-.53 1.28h-9a.75.75 0 0 1-.53-1.28l.621-.622a2.25 2.25 0 0 0 .659-1.59V18h-3a3 3 0 0 1-3-3V5.25Zm1.5 0v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5Z" clip-rule="evenodd" />
          </svg>
          Laptops
    </button>
    <button id="tab-Tablet" onclick="filterDevices('Tablet')" class="tab-button rounded-t p-4 text-sm mr-2 flex items-center hover:text-black text-gray-700 bg-gray-200">
        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-2">
            <path d="M10.5 18a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z" />
            <path fill-rule="evenodd" d="M7.125 1.5A3.375 3.375 0 0 0 3.75 4.875v14.25A3.375 3.375 0 0 0 7.125 22.5h9.75a3.375 3.375 0 0 0 3.375-3.375V4.875A3.375 3.375 0 0 0 16.875 1.5h-9.75ZM6 4.875c0-.621.504-1.125 1.125-1.125h9.75c.621 0 1.125.504 1.125 1.125v14.25c0 .621-.504 1.125-1.125 1.125h-9.75A1.125 1.125 0 0 1 6 19.125V4.875Z" clip-rule="evenodd" />
          </svg>
          Tablets
    </button>
    <button id="tab-Microcontroller" onclick="filterDevices('Microcontroller')" class="tab-button rounded-t p-4 text-sm mr-2 flex items-center hover:text-black text-gray-700 bg-gray-200">
        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-2">
            <path fill-rule="evenodd" d="M11.622 1.602a.75.75 0 0 1 .756 0l2.25 1.313a.75.75 0 0 1-.756 1.295L12 3.118 10.128 4.21a.75.75 0 1 1-.756-1.295l2.25-1.313ZM5.898 5.81a.75.75 0 0 1-.27 1.025l-1.14.665 1.14.665a.75.75 0 1 1-.756 1.295L3.75 8.806v.944a.75.75 0 0 1-1.5 0V7.5a.75.75 0 0 1 .372-.648l2.25-1.312a.75.75 0 0 1 1.026.27Zm12.204 0a.75.75 0 0 1 1.026-.27l2.25 1.312a.75.75 0 0 1 .372.648v2.25a.75.75 0 0 1-1.5 0v-.944l-1.122.654a.75.75 0 1 1-.756-1.295l1.14-.665-1.14-.665a.75.75 0 0 1-.27-1.025Zm-9 5.25a.75.75 0 0 1 1.026-.27L12 11.882l1.872-1.092a.75.75 0 1 1 .756 1.295l-1.878 1.096V15a.75.75 0 0 1-1.5 0v-1.82l-1.878-1.095a.75.75 0 0 1-.27-1.025ZM3 13.5a.75.75 0 0 1 .75.75v1.82l1.878 1.095a.75.75 0 1 1-.756 1.295l-2.25-1.312a.75.75 0 0 1-.372-.648v-2.25A.75.75 0 0 1 3 13.5Zm18 0a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-.372.648l-2.25 1.312a.75.75 0 1 1-.756-1.295l1.878-1.096V14.25a.75.75 0 0 1 .75-.75Zm-9 5.25a.75.75 0 0 1 .75.75v.944l1.122-.654a.75.75 0 1 1 .756 1.295l-2.25 1.313a.75.75 0 0 1-.756 0l-2.25-1.313a.75.75 0 1 1 .756-1.295l1.122.654V19.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
        </svg>
        Microcon.
    </button>
    <button id="tab-Neu" onclick="filterDevices('Neu')" class="tab-button rounded-t p-4 text-sm mr-2 flex items-center hover:text-black text-gray-700 bg-gray-200" style="display: none !important;">
        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-2">
            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
        </svg>
        Neue Kategorie
    </button>
    <button id="tab-Sonstiges" onclick="filterDevices('Sonstiges')" class="tab-button rounded-t p-4 text-sm mr-2 flex items-center hover:text-black text-gray-700 bg-gray-200">
        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-2">
            <path d="M19.906 9c.382 0 .749.057 1.094.162V9a3 3 0 0 0-3-3h-3.879a.75.75 0 0 1-.53-.22L11.47 3.66A2.25 2.25 0 0 0 9.879 3H6a3 3 0 0 0-3 3v3.162A3.756 3.756 0 0 1 4.094 9h15.812ZM4.094 10.5a2.25 2.25 0 0 0-2.227 2.568l.857 6A2.25 2.25 0 0 0 4.951 21H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-2.227-2.568H4.094Z" />
      </svg>
        Sonstige
    </button>
</div>
<div class="container mx-auto flex items-center mb-8 p-4 pt-8 bg-gray-600 rounded-tr rounded-b">
    <div id="customMessage" style="display: none;" class="text-white text-sm ml-4 my-4">
        <h3 class="text-lg font-bold mb-2">Hinweis</h3>
        Wende dich an die Administration, wenn eine weitere Kategorie hinzugefügt werden soll.
    </div>
    <table class="w-full bg-gray-700 text-white rounded-lg table-fixed text-left">
        <thead>
            <tr>
                <th class="border-b-2 px-4 py-2 border-gray-500 w-1/8 font-medium text-sm">Bild</th>
                <th class="border-b-2 px-4 py-2 border-gray-500 w-1/4 font-medium text-sm">Name & Label</th>
                <th class="border-b-2 px-4 py-2 border-gray-500 w-1/8 font-medium text-sm">Ort (Schrank/Fach)</th>
                <th class="border-b-2 px-4 py-2 border-gray-500 w-1/8 font-medium text-sm">Kategorie</th>
                <th class="border-b-2 px-4 py-2 border-gray-500 w-1/8 font-medium text-sm">Status</th>
                @foreach($devices as $device)
                @if ($device->borrower_name)
                    <th class="border-b-2 px-4 py-2 border-gray-500 w-1/4 font-medium text-sm">Leihnehmende</th>
                    @break
                @else
                    <td class="border-b-2 px-4 py-2 border-gray-500 text-xs w-1/4 text-white"></td>
                    @break
                @endif
                @endforeach
                <th class="border-b-2 px-4 py-2 border-gray-500 w-1/8 font-medium text-sm"></th>
            </tr>
        </thead>
        <tbody id="deviceTableBody">
            @foreach($devices as $device)
                <tr class="device-row" data-group="{{ $device->group }}">
                    <td class="border-b px-4 py-2 border-gray-600">
                        <img src="{{ $device->image ? Storage::url($device->image) : asset('img/filler.png') }}" alt="{{ $device->title }}" class="w-16 h-16 object-cover cursor-pointer rounded border-2 hover:border-gray-400" onclick="openImageModal('{{ $device->image ? Storage::url($device->image) : asset('img/filler.png') }}')">
                    </td>
                    <td class="border-b px-4 py-2 border-gray-600 text-sm break-words">
                        <a href="{{ route('devices.show', $device->id) }}" class="text-gray-300 hover:underline hover:text-white">{{ $device->title }}</a>
                    </td>
                    <td class="border-b px-4 py-2 border-gray-600 text-sm break-words text-gray-300 ">{{ $device->description }}</td>
                    <td class="border-b px-4 py-2 border-gray-600 text-sm break-words text-gray-300 ">
                        @switch($device->group)
                            @case('VRAR')
                                VR-/AR-Brille
                                @break

                            @case('Videokonferenzsystem')
                                Videokonf.
                                @break

                            @default
                                {{ $device->group }}
                        @endswitch
                    </td>
                    <td class="border-b px-4 py-2 border-gray-600 text-xs">
                        <span class="text-white {{ $device->status == 'available' ? 'bg-green-600' : 'bg-yellow-600' }} rounded p-2 inline-flex">
                            {{ $device->status == 'available' ? 'Verfügbar' : 'Verliehen' }}
                        </span>
                    </td>
                    @if ($device->borrower_name)
                        <td class="border-b px-4 py-2 border-gray-600 text-xs text-gray-300 ">{{ $device->borrower_name }} bis {{ \Carbon\Carbon::parse($device->loan_end_date)->format('d.m.Y') }}</td>
                    @else
                        <td class="border-b px-4 py-2 border-gray-600 text-xs text-gray-300 "> </td>
                    @endif
                    <td class="border-b px-4 py-2 border-gray-600 text-sm text-right">
                        <div class="flex justify-end items-center space-x-0">
                            @if ($device->status == 'available')
                                <button onclick="openLoanModal({{ $device->id }})" class="shadow-md bg-gray-100 hover:bg-white text-gray-800 font-bold py-2 px-4 rounded" style="min-width: 200px;">
                                    Verleihen
                                </button>
                            @else
                                <form id="return-form-{{ $device->id }}" action="{{ route('devices.return') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="device_id" value="{{ $device->id }}">
                                    <button type="button" onclick="confirmReturn({{ $device->id }}, '{{ $device->title }}', '{{ $device->description }}')" class="shadow-md bg-gray-900 hover:bg-black text-white font-bold py-2 px-4 rounded" style="min-width: 200px;">
                                        Zurückgeben
                                    </button>
                                </form>
                            @endif
                            <a href="{{ route('devices.edit', $device) }}" class="py-2 pl-6 pr-2 rounded text-white">
                                <svg height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                    <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                </svg>
                            </a>
                            <form action="{{ route('devices.destroy', $device) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="py-2 px-0 rounded text-white" onclick="return confirm('Sind Sie sicher, dass Sie dieses Gerät löschen möchten?')">
                                    <svg height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div id="imageModal" class="fixed inset-0 bg-gray-900 bg-opacity-75 hidden flex justify-center items-center z-10" onclick="closeImageModal()">
    <div class="bg-white p-1 rounded-lg relative" onclick="event.stopPropagation()">
        <span class="absolute top-2 right-2 p-2 cursor-pointer text-white" onclick="closeImageModal()">
            <svg height="36" width="36" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-white">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
            </svg>
        </span>
        <img id="modalImage" src="" alt="Image" class="max-w-screen-md max-h-screen-md rounded-lg">
    </div>
</div>

<!-- Verleihen Modal -->
<div id="loanModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Gerät verleihen</h3>
                        <div class="mt-2">
                            <form id="loanForm" action="{{ route('devices.loan') }}" method="POST">
                                @csrf
                                <input type="hidden" name="device_id" id="device_id">
                                <div class="mb-4">
                                    <label for="borrower_name" class="block text-gray-700 text-sm font-bold mb-2">Name der Person:</label>
                                    <input type="text" name="borrower_name" id="borrower_name" class="bg-gray-50 focus:ring-gray-500 focus:border-gray-500 border-gray-300 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" required>
                                </div>
                                <div class="mb-4">
                                    <label for="loan_start_date" class="block text-gray-700 text-sm font-bold mb-2">Anfangsdatum:</label>
                                    <input type="date" name="loan_start_date" id="loan_start_date" class="bg-gray-50 focus:ring-gray-500 focus:border-gray-500 border-gray-300 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" required>
                                </div>
                                <div class="mb-4">
                                    <label for="loan_end_date" class="block text-gray-700 text-sm font-bold mb-2">Enddatum:</label>
                                    <input type="date" name="loan_end_date" id="loan_end_date" class="bg-gray-50 focus:ring-gray-500 focus:border-gray-500 border-gray-300 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" required>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" onclick="submitLoanForm()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 text-base font-medium text-white hover:bg-black sm:ml-3 sm:w-auto sm:text-sm">Verleihen</button>
                <button type="button" onclick="closeLoanModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-100 text-base font-medium text-black hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Abbrechen</button>
            </div>
        </div>
    </div>
</div>

<style>
    .tab-button:focus {
        outline: none;
    }
</style>

<script>
    function openImageModal(imageUrl) {
        document.getElementById('modalImage').src = imageUrl;
        document.getElementById('imageModal').classList.remove('hidden');
    }

    function closeImageModal() {
        document.getElementById('imageModal').classList.add('hidden');
    }

    function openLoanModal(deviceId) {
        document.getElementById('device_id').value = deviceId;
        document.getElementById('loanModal').classList.remove('hidden');
    }

    function closeLoanModal() {
        document.getElementById('loanModal').classList.add('hidden');
    }

    function submitLoanForm() {
        document.getElementById('loanForm').submit();
    }

    function confirmReturn(deviceId, deviceTitle, deviceDescription) {
        const message = `Wurde ${deviceTitle} zurückgegeben und in den entsprechenden Aufbewahrungsort ${deviceDescription} zurückgeräumt?`;
        if (confirm(message)) {
            document.getElementById(`return-form-${deviceId}`).submit();
        }
    }

    function filterDevices(group) {
        const rows = document.querySelectorAll('.device-row');
        const tabs = document.querySelectorAll('.tab-button');
        const table = document.querySelector('table');
        const message = document.getElementById('customMessage');

        if (group === 'Neu') {
            table.style.display = 'none';
            message.style.display = 'block';
        } else {
            table.style.display = '';
            message.style.display = 'none';

            rows.forEach(row => {
                if (group === '' || row.dataset.group === group) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        tabs.forEach(tab => {
            tab.classList.remove('bg-gray-600', 'text-white');
            tab.classList.add('text-gray-700', 'hover:text-black');
        });

        const activeTab = document.getElementById(`tab-${group}` || 'tab-');
        if (activeTab) {
            activeTab.classList.add('bg-gray-600', 'text-white');
            activeTab.classList.remove('text-gray-700', 'hover:text-black');
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        filterDevices('');
    });
</script>
@endsection

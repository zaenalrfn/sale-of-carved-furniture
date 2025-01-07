<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- alert success --}}
                    @if (session('success'))
                        <div id="alert-success"
                            class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10c0 4.418-3.582 8-8 8s-8-3.582-8-8 3.582-8 8-8 8 3.582 8 8zM9 9V5a1 1 0 112 0v4a1 1 0 01-.293.707l-3 3a1 1 0 01-1.414-1.414l3-3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Success</span>
                            <div class="ml-3 text-sm font-medium">
                                {{ session('success') }}
                            </div>
                            <button type="button" id="close-alert"
                                class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                                data-dismiss-target="#alert-success" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @endif
                    {{-- alert error --}}
                    @if (session('error'))
                        <div id="alert-error"
                            class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10c0 4.418-3.582 8-8 8s-8-3.582-8-8 3.582-8 8-8 8 3.582 8 8zM9 9V5a1 1 0 112 0v4a1 1 0 01-.293.707l-3 3a1 1 0 01-1.414-1.414l3-3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Error</span>
                            <div class="ml-3 text-sm font-medium">
                                {{ session('error') }}
                            </div>
                            <button type="button" id="close-alert"
                                class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                                data-dismiss-target="#alert-error" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Start block -->
                    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased">
                        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                            <!-- Start coding here -->
                            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                                <div
                                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                                    <div class="w-full md:w-1/2">
                                        <form class="flex items-center">
                                            <label for="simple-search" class="sr-only">Search</label>
                                            <div class="relative w-full">
                                                <div
                                                    class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                    <svg aria-hidden="true"
                                                        class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                        fill="currentColor" viewbox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <input type="text" id="simple-search"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Search" required="">
                                            </div>
                                        </form>
                                    </div>
                                    <div
                                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                        <button type="button" id="createProductModalButton"
                                            data-modal-target="createProductModal"
                                            data-modal-toggle="createProductModal"
                                            class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path clip-rule="evenodd" fill-rule="evenodd"
                                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                            </svg>
                                            Add product
                                        </button>
                                        <div class="flex items-center space-x-3 w-full md:w-auto">
                                            <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown"
                                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                                type="button">
                                                <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor"
                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                                    aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                </svg>
                                                Actions
                                            </button>
                                            <div id="actionsDropdown"
                                                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                <div class="py-1">
                                                    <a href="#"
                                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                                                        all</a>
                                                </div>
                                            </div>
                                            <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                                type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                                    class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Filter
                                                <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor"
                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                                    aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                </svg>
                                            </button>
                                            <div id="filterDropdown"
                                                class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                                <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                                                    Category</h6>
                                                <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                                    <li class="flex items-center">
                                                        <input id="apple" type="checkbox" value=""
                                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                        <label for="apple"
                                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Apple
                                                            (56)</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-4 py-4">Product name</th>
                                                <th scope="col" class="px-4 py-3">Category</th>
                                                <th scope="col" class="px-4 py-3">Wood Type</th>
                                                <th scope="col" class="px-4 py-3">Description</th>
                                                <th scope="col" class="px-4 py-3">Image</th>
                                                <th scope="col" class="px-4 py-3">Price</th>
                                                <th scope="col" class="px-4 py-3">
                                                    <span class="sr-only">Actions</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($products as $product)
                                                <tr class="border-b dark:border-gray-700">
                                                    <th scope="row"
                                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $product->name }}</th>
                                                    <td class="px-4 py-3">
                                                        {{ $product->category->name ?? 'No Category' }}
                                                    </td>
                                                    <td class="px-4 py-3">{{ $product->wood_type }}</td>
                                                    <td class="px-4 py-3 max-w-[12rem] truncate">
                                                        {{ $product->description }}</td>
                                                    <td class="px-4 py-3">
                                                        @if ($product->images->isNotEmpty())
                                                            <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                                                alt="Product Image" class="h-14 w-14">
                                                        @else
                                                            <span>No Image</span>
                                                        @endif
                                                    </td>
                                                    <td class="px-4 py-3"> ${{ number_format($product->price, 2) }}
                                                    </td>
                                                    <td class="px-4 py-3 flex items-center justify-end">
                                                        <button id="benq-ex2710q-dropdown-button{{ $product->id }}"
                                                            data-dropdown-toggle="benq-ex2710q-dropdown{{ $product->id }}"
                                                            class="inline-flex items-center text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700 p-1.5 dark:hover-bg-gray-800 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                                            type="button">
                                                            <svg class="w-5 h-5" aria-hidden="true"
                                                                fill="currentColor" viewbox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                            </svg>
                                                        </button>
                                                        <div id="benq-ex2710q-dropdown{{ $product->id }}"
                                                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                            <ul class="py-1 text-sm"
                                                                aria-labelledby="benq-ex2710q-dropdown-button">
                                                                <li>
                                                                    <button type="button"
                                                                        data-modal-target="updateProductModal{{ $product->id }}"
                                                                        data-modal-toggle="updateProductModal{{ $product->id }}"
                                                                        class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                                                        <svg class="w-4 h-4 mr-2"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewbox="0 0 20 20" fill="currentColor"
                                                                            aria-hidden="true">
                                                                            <path
                                                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                                            <path fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                                                        </svg>
                                                                        Edit
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button"
                                                                        data-modal-target="readProductModal{{ $product->id }}"
                                                                        data-modal-toggle="readProductModal{{ $product->id }}"
                                                                        class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                                                        <svg class="w-4 h-4 mr-2"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewbox="0 0 20 20" fill="currentColor"
                                                                            aria-hidden="true">
                                                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                                            <path fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" />
                                                                        </svg>
                                                                        Preview
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button"
                                                                        data-modal-target="deleteModal{{ $product->id }}"
                                                                        data-modal-toggle="deleteModal{{ $product->id }}"
                                                                        class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 text-red-500 dark:hover:text-red-400">
                                                                        <svg class="w-4 h-4 mr-2" viewbox="0 0 14 15"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            aria-hidden="true">
                                                                            <path fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                fill="currentColor"
                                                                                d="M6.09922 0.300781C5.93212 0.30087 5.76835 0.347476 5.62625 0.435378C5.48414 0.523281 5.36931 0.649009 5.29462 0.798481L4.64302 2.10078H1.59922C1.36052 2.10078 1.13161 2.1956 0.962823 2.36439C0.79404 2.53317 0.699219 2.76209 0.699219 3.00078C0.699219 3.23948 0.79404 3.46839 0.962823 3.63718C1.13161 3.80596 1.36052 3.90078 1.59922 3.90078V12.9008C1.59922 13.3782 1.78886 13.836 2.12643 14.1736C2.46399 14.5111 2.92183 14.7008 3.39922 14.7008H10.5992C11.0766 14.7008 11.5344 14.5111 11.872 14.1736C12.2096 13.836 12.3992 13.3782 12.3992 12.9008V3.90078C12.6379 3.90078 12.8668 3.80596 13.0356 3.63718C13.2044 3.46839 13.2992 3.23948 13.2992 3.00078C13.2992 2.76209 13.2044 2.53317 13.0356 2.36439C12.8668 2.1956 12.6379 2.10078 12.3992 2.10078H9.35542L8.70382 0.798481C8.62913 0.649009 8.5143 0.523281 8.37219 0.435378C8.23009 0.347476 8.06631 0.30087 7.89922 0.300781H6.09922ZM4.29922 5.70078C4.29922 5.46209 4.39404 5.23317 4.56282 5.06439C4.73161 4.8956 4.96052 4.80078 5.19922 4.80078C5.43791 4.80078 5.66683 4.8956 5.83561 5.06439C6.0044 5.23317 6.09922 5.46209 6.09922 5.70078V11.1008C6.09922 11.3395 6.0044 11.5684 5.83561 11.7372C5.66683 11.906 5.43791 12.0008 5.19922 12.0008C4.96052 12.0008 4.73161 11.906 4.56282 11.7372C4.39404 11.5684 4.29922 11.3395 4.29922 11.1008V5.70078ZM8.79922 4.80078C8.56052 4.80078 8.33161 4.8956 8.16282 5.06439C7.99404 5.23317 7.89922 5.46209 7.89922 5.70078V11.1008C7.89922 11.3395 7.99404 11.5684 8.16282 11.7372C8.33161 11.906 8.56052 12.0008 8.79922 12.0008C9.03791 12.0008 9.26683 11.906 9.43561 11.7372C9.6044 11.5684 9.69922 11.3395 9.69922 11.1008V5.70078C9.69922 5.46209 9.6044 5.23317 9.43561 5.06439C9.26683 4.8956 9.03791 4.80078 8.79922 4.80078Z" />
                                                                        </svg>
                                                                        Delete
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Read modal -->
                                                <div id="readProductModal{{ $product->id }}" tabindex="-1"
                                                    aria-hidden="true"
                                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                        <div
                                                            class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                                            <!-- Modal header -->
                                                            <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                                                                <div
                                                                    class="text-lg text-gray-900 md:text-xl dark:text-white">
                                                                    <div class="mb-4">
                                                                        <!-- Main active image -->
                                                                        <div class="relative h-96 mb-4">
                                                                            @if ($product->images->count() > 0)
                                                                                <img src="{{ Storage::url($product->images->first()->image_path) }}"
                                                                                    alt="{{ $product->name }}"
                                                                                    class="w-full h-full object-cover rounded-lg active-image"
                                                                                    id="mainImage{{ $product->id }}">
                                                                            @endif
                                                                        </div>
                                                                        <!-- Thumbnail images -->
                                                                        <div class="flex gap-2 overflow-x-auto">
                                                                            @foreach ($product->images as $index => $image)
                                                                                <button type="button"
                                                                                    onclick="switchImage('{{ Storage::url($image->image_path) }}', 'mainImage{{ $product->id }}')"
                                                                                    class="flex-shrink-0 w-24 h-24 rounded-lg overflow-hidden">
                                                                                    <img src="{{ Storage::url($image->image_path) }}"
                                                                                        alt="{{ $product->name }} thumbnail {{ $loop->iteration }}"
                                                                                        class="w-full h-full object-cover">
                                                                                </button>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>

                                                                    <h3 class="font-semibold">{{ $product->name }}
                                                                    </h3>
                                                                    <p class="font-bold">${{ $product->price }}</p>
                                                                </div>

                                                            </div>
                                                            <dl>
                                                                <dt
                                                                    class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                                    Short Description</dt>
                                                                <dd
                                                                    class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                                    {{ $product->short_description }}</dd>
                                                                <dt
                                                                    class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                                    Long Description</dt>
                                                                <dd
                                                                    class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                                    {{ $product->description }}</dd>
                                                                <dt
                                                                    class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                                    Category</dt>
                                                                <dd
                                                                    class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                                    {{ $product->category->name }}</dd>
                                                            </dl>
                                                            <div class="mb-4">
                                                                <dt
                                                                    class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                                    Tags</dt>
                                                                <div class="flex flex-wrap gap-2">
                                                                    @foreach ($product->tags as $tag)
                                                                        <span
                                                                            class="bg-gray-100 text-gray-800 text-sm font-medium px-3 py-2 rounded-md dark:bg-gray-700 dark:text-gray-300">
                                                                            {{ $tag->name }}
                                                                        </span>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="flex justify-end items-center">
                                                                <div class="flex items-center space-x-3 sm:space-x-4">
                                                                    <button type="button"
                                                                        class="p-4 bg-red-700 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm inline-flex dark:hover:bg-gray-600 dark:hover:text-white"
                                                                        data-modal-toggle="readProductModal{{ $product->id }}">
                                                                        <h3
                                                                            class="font-semibold leading-none text-white dark:text-white">
                                                                            Tutup</h3>
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- update modal --}}
                                                <div id="updateProductModal{{ $product->id }}" tabindex="-1"
                                                    aria-hidden="true"
                                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                        <div
                                                            class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                                            <div
                                                                class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                                                <h3
                                                                    class="text-lg font-semibold text-gray-900 dark:text-white">
                                                                    Update Product</h3>
                                                                <button type="button"
                                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                    data-modal-toggle="updateProductModal{{ $product->id }}">
                                                                    <svg aria-hidden="true" class="w-5 h-5"
                                                                        fill="currentColor" viewbox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd"
                                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                    <span class="sr-only">Close modal</span>
                                                                </button>
                                                            </div>
                                                            <form id="image-form"
                                                                action="{{ route('products.update', ['product' => $product->id]) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                                                    <!-- Nama -->
                                                                    <div>
                                                                        <label for="name"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                                        <input type="text" name="name"
                                                                            id="name"
                                                                            value="{{ $product->name }}"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                            required>
                                                                    </div>

                                                                    <!-- Wood Type -->
                                                                    <div>
                                                                        <label for="wood_type"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Wood
                                                                            Type</label>
                                                                        <input type="text" name="wood_type"
                                                                            id="wood_type"
                                                                            value="{{ $product->wood_type }}"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                            required>
                                                                    </div>

                                                                    <!-- Harga -->
                                                                    <div>
                                                                        <label for="price"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                                                        <input type="number" name="price"
                                                                            id="price"
                                                                            value="{{ $product->price }}"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                            required>
                                                                    </div>

                                                                    <!-- Discount Price -->
                                                                    <div>
                                                                        <label for="discount_price"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discount
                                                                            Price</label>
                                                                        <input type="number" name="discount_price"
                                                                            id="discount_price"
                                                                            value="{{ $product->discount_price }}"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                    </div>

                                                                    <!-- Kategori -->
                                                                    <div>
                                                                        <label for="category"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                                                        <select id="category" name="category_id"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                            required>
                                                                            <option value="">Select category
                                                                            </option>
                                                                            @foreach ($categories as $category)
                                                                                <option value="{{ $category->id }}"
                                                                                    @if ($category->id == $product->category_id) selected @endif>
                                                                                    {{ $category->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <!-- Tags -->
                                                                    <div class="sm:col-span-2">
                                                                        <label for="tagsUpdate{{ $product->id }}"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                                                                        <input id="tagsUpdate{{ $product->id }}"
                                                                            name="tags"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                            value="{{ json_encode($product->tags->pluck('name')) }}">
                                                                        <p
                                                                            class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                                                            Type tags and press Enter.</p>
                                                                    </div>

                                                                    <!-- Image Preview & Upload -->
                                                                    <div class="sm:col-span-2">
                                                                        <label for="imagesUpdate"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                            Update Images (Max 3 Files)
                                                                        </label>
                                                                        <div id="alert-image-update"></div>

                                                                        <!-- Input Gambar 1 -->
                                                                        <div class="mb-4">
                                                                            <label
                                                                                for="imageUpdate{{ $product->id }}"
                                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image
                                                                                1</label>
                                                                            <input type="file"
                                                                                id="imageUpdate{{ $product->id }}"
                                                                                name="images[]" accept="image/*"
                                                                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600">
                                                                            <img id="preview-imageUpdate{{ $product->id }}"
                                                                                src="{{ $product->images[0]->image_path ?? '' }}"
                                                                                class="mt-2 rounded-md max-h-48 {{ $product->images[0] ? '' : 'hidden' }}"
                                                                                alt="Preview Image 1">
                                                                        </div>

                                                                        <!-- Input Gambar 2 -->
                                                                        <div class="mb-4">
                                                                            <label
                                                                                for="imageUpdate{{ $product->id }}"
                                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image
                                                                                2</label>
                                                                            <input type="file"
                                                                                id="imageUpdate{{ $product->id }}"
                                                                                name="images[]" accept="image/*"
                                                                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600">
                                                                            <img id="preview-imageUpdate{{ $product->id }}"
                                                                                src="{{ $product->images[1]->image_path ?? '' }}"
                                                                                class="mt-2 rounded-md max-h-48 {{ $product->images[1] ? '' : 'hidden' }}"
                                                                                alt="Preview Image 2">
                                                                        </div>

                                                                        <!-- Input Gambar 3 -->
                                                                        <div class="mb-4">
                                                                            <label
                                                                                for="imageUpdate{{ $product->id }}"
                                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image
                                                                                3</label>
                                                                            <input type="file"
                                                                                id="imageUpdate{{ $product->id }}"
                                                                                name="images[]" accept="image/*"
                                                                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600">
                                                                            <img id="preview-imageUpdate{{ $product->id }}"
                                                                                src="{{ $product->images[2]->image_path ?? '' }}"
                                                                                class="mt-2 rounded-md max-h-48 {{ $product->images[2] ? '' : 'hidden' }}"
                                                                                alt="Preview Image 3">
                                                                        </div>

                                                                        <p
                                                                            class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                                                            You can upload up to 3 images only. Existing
                                                                            images will be replaced if new images are
                                                                            uploaded.
                                                                        </p>
                                                                    </div>


                                                                    <!-- Deskripsi -->
                                                                    <div class="sm:col-span-2">
                                                                        <label for="short_description"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Short
                                                                            Description</label>
                                                                        <textarea id="short_description" rows="2" name="short_description"
                                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                            required>{{ $product->short_description }}</textarea>
                                                                    </div>
                                                                    <div class="sm:col-span-2">
                                                                        <label for="description"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                                                        <textarea id="description" rows="4" name="description"
                                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                            required>{{ $product->description }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <button type="submit"
                                                                    class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                                    <svg class="mr-1 -ml-1 w-6 h-6"
                                                                        fill="currentColor" viewbox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd"
                                                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                    Update product
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            @empty
                                                <tr>
                                                    <td colspan="5"
                                                        class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">
                                                        Belum ada produk.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                {{-- bagian paginate --}}
                            </div>
                        </div>
                    </section>
                    <!-- End block -->
                    <!-- Create modal -->
                    <div id="createProductModal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                <!-- Modal header -->
                                <div
                                    class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Add Product</h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-target="createProductModal" data-modal-toggle="createProductModal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form id="image-form" action="{{ route('products.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                        <div>
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                            <input type="text" name="name" id="name"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Type product name" required>
                                        </div>
                                        <div>
                                            <label for="wood_type"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Wood
                                                Type</label>
                                            <input type="text" name="wood_type" id="wood_type"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Product wood type" required>
                                        </div>
                                        <div>
                                            <label for="price"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                            <input type="number" name="price" id="price"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="$2999" required>
                                        </div>
                                        <div>
                                            <label for="discount_price"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discount
                                                Price</label>
                                            <input type="number" name="discount_price" id="discount_price"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="$2499">
                                        </div>
                                        <div>
                                            <label for="category"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                            <select id="category" name="category_id"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required>
                                                <option value="">Select category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="tags"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                                            <input id="tags" name="tags"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Type tags and
                                                press Enter.</p>
                                        </div>
                                        <!-- Input gambar 1 -->
                                        {{-- alert input gambar --}}
                                        @error('images')
                                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                        @enderror
                                        @error('images.*')
                                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                        @enderror

                                        <div class="sm:col-span-2">
                                            <label for="image1"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image
                                                1</label>
                                            <input type="file" id="image1" name="images[]" accept="image/*"
                                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600">
                                            <img id="preview-image1" class="mt-2 rounded-md max-h-48"
                                                style="display: none;" />
                                        </div>

                                        <!-- Input gambar 2 -->
                                        <div class="sm:col-span-2">
                                            <label for="image2"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image
                                                2</label>
                                            <input type="file" id="image2" name="images[]" accept="image/*"
                                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600">
                                            <img id="preview-image2" class="mt-2 rounded-md max-h-48"
                                                style="display: none;" />
                                        </div>

                                        <!-- Input gambar 3 -->
                                        <div class="sm:col-span-2">
                                            <label for="image3"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image
                                                3</label>
                                            <input type="file" id="image3" name="images[]" accept="image/*"
                                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600">
                                            <img id="preview-image3" class="mt-2 rounded-md max-h-48"
                                                style="display: none;" />
                                        </div>



                                        <div class="sm:col-span-2">
                                            <label for="short_description"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Short
                                                Description</label>
                                            <textarea id="short_description" rows="2" name="short_description"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Write short description here" required></textarea>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="description"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                            <textarea id="description" rows="4" name="description"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Write full description here" required></textarea>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                        <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Add new product
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- Delete modal -->
                    <div id="deleteModal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                <button type="button"
                                    class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="deleteModal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                    aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this
                                    item?</p>
                                <div class="flex justify-center items-center space-x-4">
                                    <button data-modal-toggle="deleteModal" type="button"
                                        class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                        cancel</button>
                                    <button type="submit"
                                        class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">Yes,
                                        I'm sure</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Untuk input tag di Create Product
        const createTagInput = document.querySelector('#tags');
        if (createTagInput) {
            const createTagify = new Tagify(createTagInput, {
                whitelist: @json($tags->pluck('name')),
                dropdown: {
                    maxItems: 20,
                    enabled: 0,
                    closeOnSelect: false
                }
            });
        }

        // Menginisialisasi Tagify untuk input tags per produk
        document.querySelectorAll('[id^="tagsUpdate"]').forEach(input => {
            const productId = input.id.split('tagsUpdate')[1]; // Mengambil ID produk dari ID input

            const tagify = new Tagify(input, {
                whitelist: @json($tags->pluck('name')), // Menyediakan list tag yang bisa dipilih
                dropdown: {
                    maxItems: 20,
                    enabled: 0, // Menonaktifkan dropdown yang muncul otomatis
                    closeOnSelect: false
                }
            });
        });


        function previewImage(input, previewId) {
            const file = input.files[0];
            const preview = document.getElementById(previewId);

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }

        document.getElementById('image1').addEventListener('change', function() {
            previewImage(this, 'preview-image1');
        });

        document.getElementById('image2').addEventListener('change', function() {
            previewImage(this, 'preview-image2');
        });

        document.getElementById('image3').addEventListener('change', function() {
            previewImage(this, 'preview-image3');
        });

        function switchImage(newSrc, mainImageId) {
            document.getElementById(mainImageId).src = newSrc;
        }

        // preview untuk update gambar
        // Menangani semua input file dengan id dinamis
        document.querySelectorAll('input[type="file"]').forEach((input) => {
            input.addEventListener('change', function() {
                // Ambil ID elemen input
                const inputId = this.id; // Contoh: imageUpdate123

                // Bangun ID elemen gambar pratinjau
                const previewId = `preview-${inputId}`; // Jadi: preview-imageUpdate123

                // Cari elemen gambar pratinjau
                const previewImage = document.getElementById(previewId);

                // Ambil file dari input
                const file = this.files[0];

                if (file && previewImage) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // Set src elemen gambar dengan data file
                        previewImage.src = e.target.result;
                        previewImage.classList.remove('hidden'); // Tampilkan gambar
                    };
                    reader.readAsDataURL(file); // Membaca file sebagai Data URL
                } else if (previewImage) {
                    // Jika tidak ada file, sembunyikan pratinjau
                    previewImage.src = '';
                    previewImage.classList.add('hidden');
                }
            });
        });
    </script>



</x-app-layout>

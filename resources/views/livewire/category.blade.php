<div
    x-data="{ isOpen: false, selectedProductId: null }"
    @open-slide-over.window="
        isOpen = true;
        selectedProductId = $event.detail?.id;
    "
    @close="isOpen = false"
>


    <form class="max-w-sm mx-auto justify-end mb-6">
        <label for="products" class="block mb-2 font-medium text-gray-900 dark:text-white text-2xl text-center">
            Sélectionner le produit
        </label>
        <select id="products" wire:model.live="selectedCategory"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 text-base">

            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </form>

    @if (!empty($groupedProducts))
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            @foreach ($groupedProducts as $subcategoryName => $products)
                <div class="mb-6">
                    <h2 class="mt-6 mb-8 text-xl font-semibold dark:text-white sm:text-2xl uppercase text-center">
                        {{ $subcategoryName }}
                    </h2>

                    <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                        @foreach ($products as $product)
                            <div
                                class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                <div class="h-56 w-full">
                                    <a wire:navigate href="{{route('boutique.detail', ['slug' => $product->slug])}}">
                                        @foreach ($product->images as $image)
                                            <img class="mx-auto h-full dark:hidden object-cover"
                                                 src="{{ asset('storage/'.$image->image_path) }}"
                                                 alt="{{$product->name}}"/>
                                            <img class="mx-auto hidden h-full dark:block  object-cover"
                                                 src="{{ asset('storage/'.$image->image_path) }}"
                                                 alt="{{$product->name}}"/>
                                        @endforeach
                                    </a>
                                </div>

                                <div class="pt-6">
                                    <a wire:navigate href="{{route('boutique.detail', ['slug' => $product->slug])}}"
                                       class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white line-clamp-2 h-12 block overflow-hidden">
                                        {{$product->name}}
                                    </a>

                                    <div class="mt-3 flex items-center justify-between gap-4 min-h-[50px]">
                                    <span class="text-lg font-semibold text-gray-900 dark:text-white whitespace-nowrap">
                                        {{$product->price}} €
                                    </span>

                                        <button
                                            @click="
                                                    window.dispatchEvent(new CustomEvent('add-to-cart', {
                                                        detail: { id: {{ $product->id }}, quantity: 1 }
                                                    }));
                                                    window.dispatchEvent(new CustomEvent('open-slide-over', {
                                                        detail: { id: {{ $product->id }} }
                                                    }));
                                                    "
                                              class="w-full bg-csfl text-white py-3 rounded-lg p-2 text-center"
                                              >
                                            Ajouter au panier
                                        </button>


                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endif



</div>

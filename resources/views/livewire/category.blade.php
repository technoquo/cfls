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
        <div class="flex justify-center flex-wrap gap-4 my-6">
            @foreach ($groupedProducts as $subcategoryName => $products)
                <a href="#{{ Str::slug($subcategoryName) }}"
                   class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition uppercase">
                    {{ $subcategoryName }}
                </a>
            @endforeach
        </div>
    @endif
    @if (!empty($groupedProducts))
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            @foreach ($groupedProducts as $subcategoryName => $products)
                <div class="mb-6">
                    <h2 id="{{ Str::slug($subcategoryName) }}"
                        class="mt-6 mb-8 text-xl font-semibold dark:text-white sm:text-2xl uppercase text-center">
                        {{ $subcategoryName }}
                    </h2>

                    <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                        @foreach ($products as $product)
                            <div
                                @class([
                                    'rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800',
                                    'block' => $product->status == 1 || $product->status == 2 || $product->status == 3,
                                    'hidden' => $product->status == 0,

                                ])>

                                @if ($product->status == 2)
                                    <div class="relative">
                                        <div class="absolute -top-10 -left-12 ">
                                            <img src="{{ asset('img/new.png') }}" alt="Sold Out" class="w-48">
                                        </div>
                                    </div>
                                 @elseif ($product->status == 3)
                                    <div class="relative">
                                        <div class="absolute -top-10 -left-12 ">
                                            <img src="{{ asset('img/soldout.png') }}" alt="Sold Out" class="w-48 ">
                                        </div>
                                    </div>
                                @endif
                                <div class="h-56 w-full">
                                    <a wire:navigate href="{{route('boutique.detail', ['slug' => $product->slug])}}">
                                        @if ($product->images->isNotEmpty())
                                            @php
                                                $image = $product->images->first();
                                            @endphp
                                            <img @class(['mx-auto h-full object-cover',
                                                          'opacity-50' => $product->status == 3,
                                                          'z-1' => $product->status == 3,
                                                      ])
                                                 src="{{ asset('storage/' . $image->image_path) }}"
                                                 alt="{{ $product->name }}"/>
                                        @endif
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

                                        @if ($product->status == 3)
                                            <button
                                                class="w-full bg-gray-400 text-white py-3 rounded-lg p-2 text-center cursor-not-allowed opacity-50"
                                                disabled>
                                                Indisponible
                                            </button>
                                        @else
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
                                        @endif


                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    <!-- Botón TOP -->
    <div
        x-data="{ showTopButton: false }"
        x-init="window.addEventListener('scroll', () => {
        showTopButton = window.scrollY > 300
    })"
        class="fixed bottom-6 right-6 z-50"
    >
        <button
            x-show="showTopButton"
            @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
            class="px-6 py-4 dark:bg-white  text-white text-lg font-bold rounded-full shadow-2xl hover:bg-blue-700 transition"
        >
            <img src="{{ asset('img/hout.png') }}" alt="Arrow Up" class=" w-16 h-auto">
        </button>
    </div>


</div>

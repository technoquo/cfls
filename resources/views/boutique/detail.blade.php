<x-layout>
    <x-slot name="title">{{ $product->name }}</x-slot>

    <div x-data="{ qty: 1, isOpen: false }" class="min-h-screen">
        <div class="container mx-auto p-8">
            <div class="flex flex-col md:flex-row gap-8 mt-6">
                <!-- Image Section -->
                <div class="w-full md:w-1/2" x-data="{ selectedImage: '{{ asset('storage/'.$imagefirst) }}', fade: false }">
                    <div class="p-4 border rounded-lg  flex items-center justify-center">
                        <img :src="selectedImage" alt="Zip Tote Basket"
                             class="rounded-lg object-contain w-full h-full transition-opacity duration-500"
                             :class="fade ? 'opacity-0' : 'opacity-100'" @load="fade = false"/>
                    </div>
                    <div class="flex gap-2 mt-4">
                        @foreach($images as $image)
                            <img src="{{ asset('storage/'.$image->image_path) }}" alt="Thumbnail"
                                 class="w-36 h-auto rounded-lg cursor-pointer border-2 border-transparent hover:border-gray-500"
                                 @click="fade = true; setTimeout(() => selectedImage = '{{ asset('storage/'.$image->image_path) }}', 200)"/>
                        @endforeach
                    </div>
                </div>

                <!-- Details Section -->
                <div class="w-full md:w-1/2 space-y-4">
                    <h2 class="text-3xl font-bold dark:text-white">{{ $product->name }}</h2>
                    <p class="text-xl font-semibold dark" id="price">{{ $product->price }}€</p>

                    <div class="flex gap-4 mb-4">
                        <button @click="if (qty > 1) qty--" class="bg-gray-200 px-3 py-1 rounded">-</button>
                        <span x-text="qty" class="text-xl font-bold"></span>
                        <button @click="qty++" class="bg-gray-200 px-3 py-1 rounded">+</button>
                    </div>

                    @if(!empty($product->description))
                        <p class="text-gray-500 dark:text-gray-300">
                            {!! $product->description !!}
                        </p>
                    @endif
                    <input value="" type="hidden" name="existe">
                    @if(!empty($options) && count($options) > 0)
                        <div class="space-y-4">
                            <div class="flex items-center gap-2">
                                <select x-ref="choice" class="border rounded px-4 py-2 w-full sm:w-64 text-base" name="choice">
                                    <option value="0">Choisissez une option</option>
                                    @foreach($options as $option)
                                        <option value="{{ $option->option_name }}">{{ $option->option_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif

                    <!-- Botón unificado con mismo x-data -->
                    <div class="flex-1">
                        <button class="w-full bg-csfl text-white py-3 rounded-lg p-2 text-center"
                                @click="
                                const selected = $refs.choice?.value ?? null;
                                isOpen = true;
                                $dispatch('add-to-cart', {
                                    id: {{ $product->id }},
                                    quantity: qty,
                                    choix: selected,
                                })
                            ">
                            Ajouter au panier
                        </button>

                        <x-slide-over x-show="isOpen" @close="isOpen = false" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

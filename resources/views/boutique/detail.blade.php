<x-layout>
    <x-slot name="title">{{ $product->name }}</x-slot>

    <div  x-data="{ qty: 1, isOpen: false }" class="min-h-screen">
        <div class="container mx-auto p-8">
            <div class="flex flex-col md:flex-row gap-8 mt-6">
                <!-- Image Section -->
                <div class="w-full md:w-1/2" x-data="{ selectedImage: '{{ asset('storage/'.$imagefirst) }}', fade: false }">
                    <div class="p-4 border rounded-lg  flex items-center justify-center">
                        <img :src="selectedImage" alt="Zip Tote Basket" class="rounded-lg object-contain w-full h-full transition-opacity duration-500" :class="fade ? 'opacity-0' : 'opacity-100'" @load="fade = false"/>
                    </div>
                    <div class="flex gap-2 mt-4">
                        <!-- Thumbnails -->
                        <img src="{{ asset('storage/'.$imagefirst) }}" alt="Thumbnail 1" class="w-36 h-auto rounded-lg cursor-pointer border-2 border-transparent hover:border-gray-500" @click="fade = true; setTimeout(() => selectedImage = '{{ asset('storage/'.$imagefirst) }}', 200)"/>
                        <img src="https://static.wixstatic.com/media/beceb7_f878cfbc95e0473c87b89dae969895ae~mv2.jpg/v1/fill/w_500,h_750,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/beceb7_f878cfbc95e0473c87b89dae969895ae~mv2.jpg" alt="Thumbnail 2" class="w-36 h-auto rounded-lg cursor-pointer border-2 border-transparent hover:border-gray-500" @click="fade = true; setTimeout(() => selectedImage = 'https://static.wixstatic.com/media/beceb7_f878cfbc95e0473c87b89dae969895ae~mv2.jpg/v1/fill/w_500,h_750,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/beceb7_f878cfbc95e0473c87b89dae969895ae~mv2.jpg', 200)"/>
                        <img src="https://static.wixstatic.com/media/beceb7_f9e9ecf17b7f4993a59d20a5a25142aa~mv2.jpg/v1/fill/w_500,h_750,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/beceb7_f9e9ecf17b7f4993a59d20a5a25142aa~mv2.jpg" alt="Thumbnail 3" class="w-36 h-auto rounded-lg cursor-pointer border-2 border-transparent hover:border-gray-500" @click="fade = true; setTimeout(() => selectedImage = 'https://static.wixstatic.com/media/beceb7_f9e9ecf17b7f4993a59d20a5a25142aa~mv2.jpg/v1/fill/w_500,h_750,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/beceb7_f9e9ecf17b7f4993a59d20a5a25142aa~mv2.jpg', 200)"/>
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
                        {!! $product->description  !!}
                    </p>
                    @endif
                       <!-- Botón con tamaño uniforme -->
                       <div x-data="{ isOpen: false }" class="flex-1">
                           <button class="w-full bg-csfl text-white py-3 rounded-lg p-2 text-center"
                                   @click="isOpen = true; $dispatch('add-to-cart', { id: {{ $product->id }}, quantity: qty })">
                               Ajouter au panier
                           </button>

                           <x-slide-over x-show="isOpen" @close="isOpen = false" />
                    </div>
                </div>
            </div>
        </div>

    </div>


</x-layout>

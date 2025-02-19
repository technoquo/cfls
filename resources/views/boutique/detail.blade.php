<x-layout>
    <x-slot name="title">{{ $slug }}</x-slot>

    <div x-data="{ isOpen: false }" class="min-h-screen">
        <div class="container mx-auto p-8">
            <div class="flex flex-col md:flex-row gap-8 mt-6">
                <!-- Image Section -->
                <div class="w-full md:w-1/2" x-data="{ selectedImage: '{{ asset('img/unites/COUV_SYLLABUS_UE1.jpg') }}', fade: false }">
                    <div class="p-4 border rounded-lg  flex items-center justify-center">
                        <img :src="selectedImage" alt="Zip Tote Basket" class="rounded-lg object-contain w-full h-full transition-opacity duration-500" :class="fade ? 'opacity-0' : 'opacity-100'" @load="fade = false"/>
                    </div>
                    <div class="flex gap-2 mt-4">
                        <!-- Thumbnails -->
                        <img src="{{ asset('img/unites/COUV_SYLLABUS_UE1.jpg') }}" alt="Thumbnail 1" class="w-36 h-auto rounded-lg cursor-pointer border-2 border-transparent hover:border-gray-500" @click="fade = true; setTimeout(() => selectedImage = '{{ asset('img/unites/COUV_SYLLABUS_UE1.jpg') }}', 200)"/>
                        <img src="https://static.wixstatic.com/media/beceb7_f878cfbc95e0473c87b89dae969895ae~mv2.jpg/v1/fill/w_500,h_750,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/beceb7_f878cfbc95e0473c87b89dae969895ae~mv2.jpg" alt="Thumbnail 2" class="w-36 h-auto rounded-lg cursor-pointer border-2 border-transparent hover:border-gray-500" @click="fade = true; setTimeout(() => selectedImage = 'https://static.wixstatic.com/media/beceb7_f878cfbc95e0473c87b89dae969895ae~mv2.jpg/v1/fill/w_500,h_750,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/beceb7_f878cfbc95e0473c87b89dae969895ae~mv2.jpg', 200)"/>
                        <img src="https://static.wixstatic.com/media/beceb7_f9e9ecf17b7f4993a59d20a5a25142aa~mv2.jpg/v1/fill/w_500,h_750,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/beceb7_f9e9ecf17b7f4993a59d20a5a25142aa~mv2.jpg" alt="Thumbnail 3" class="w-36 h-auto rounded-lg cursor-pointer border-2 border-transparent hover:border-gray-500" @click="fade = true; setTimeout(() => selectedImage = 'https://static.wixstatic.com/media/beceb7_f9e9ecf17b7f4993a59d20a5a25142aa~mv2.jpg/v1/fill/w_500,h_750,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/beceb7_f9e9ecf17b7f4993a59d20a5a25142aa~mv2.jpg', 200)"/>
                    </div>
                </div>
                <!-- Details Section -->
                <div class="w-full md:w-1/2 space-y-4">
                    <h2 class="text-3xl font-bold">Syllabus UE 1</h2>
                    <p class="text-xl font-semibold">30,00€</p>
                    <p class="text-gray-500 dark:text-gray-300">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium minus provident facilis eligendi at necessitatibus. Laborum nesciunt est nobis voluptates illum officia obcaecati hic error nemo vero? Numquam, quod pariatur!
                    </p>
                    <button class="w-full bg-csfl text-white py-3 rounded-lg" @click="isOpen = true">Ajouter au panier</button>
                </div>
            </div>
        </div>        
    </div>

    <!-- Slide-over component -->
    <x-slide-over x-show="isOpen" />
</x-layout>

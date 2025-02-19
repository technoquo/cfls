<x-layout>
    <?php
    $categories = [
        "Unités d'enseignement" => [
            ['name' => 'Syllabus UE 1', 'price' => 30.0, 'image' => asset('img/unites/COUV_SYLLABUS_UE1.jpg')],
            ['name' => 'Alphabet (Afiche A3 plastifiée)', 'price' => 3.5, 'image' => asset('img/unites/affiche alphabet_page-0001(1).jpg')],
            ['name' => 'Règles de grammaire en langue des signes', 'price' => 16.0, 'image' => asset('img/unites/cover gram.jpg')],
            ['name' => 'UE 6', 'price' => 20.0, 'image' => asset('img/unites/Cover_orange_1_UE6_modifié.jpg')]
        ],
        'Ventes combinées' => [
            ['name' => 'Pack UE1 + Mots croisés UE1 + Grammaire', 'price' => 45.0, 'image' => asset('img/pack/collection MC.png')],
            ['name' => 'U.E.1 et ses mots-croisés', 'price' => 22.0, 'image' => asset('img/pack/UE2+MC UE2.png')],
            ['name' => 'U.E. 2 et ses mots croisés', 'price' => 20.0, 'image' => asset('img/pack/UE3 +MC UE3.png')],
            ['name' => 'U.E. 3 et ses mots croisés', 'price' => 22, 'image' => asset('img/pack/UE4 + MC UE4.png')]
        ]
    ];
    ?>
    
    <x-slot name="title">Boutique</x-slot>

    <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <?php foreach ($categories as $category => $products): ?>
                <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
                    <div>
                        <h2 class="mt-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl"><?php echo $category; ?></h2>
                    </div>
                </div>

                <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                    <?php foreach ($products as $product): ?>
                        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <div class="h-56 w-full">
                               <a href="{{ route('boutique.detail', ['slug' => 'syllabus-ue-1']) }}">
                                    <img class="mx-auto h-full dark:hidden" src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" />
                                    <img class="mx-auto hidden h-full dark:block" src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" />
                                </a>
                            </div>

                            <div class="pt-6">
                                <div class="mb-4 flex items-center justify-end gap-4">
                                    {{-- <span class="me-2 rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">Up to 35% off</span> --}}
                                    <div class="flex items-center justify-end gap-1">
                                       
                                      

                                        <button type="button" data-tooltip-target="tooltip-add-to-favorites" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <span class="sr-only">Add to Favorites</span>
                                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
                                            </svg>
                                        </button>
                                        <!-- Tooltip for Add to Favorites -->
                                        <div id="tooltip-add-to-favorites" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700" data-popper-placement="top">
                                            Add to favorites
                                            <div class="tooltip-arrow" data-popper-arrow=""></div>
                                        </div>
                                    </div>
                                </div>

                                <a href="#" class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white"><?php echo $product['name']; ?></a>

                                <div class="mt-2 flex items-center gap-2">
                                  
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">(455)</p>
                                </div>

                     

                                <div class="mt-3 flex items-center justify-between">
                                    <span class="text-lg font-semibold text-gray-900 dark:text-white"><?php echo number_format($product['price'], 2, ',', ' ') . ' €'; ?></span>

                                    <a href="{{ route('boutique.detail', ['slug' => 'syllabus-ue-1']) }}" class="rounded-lg bg-csfl py-2 px-4 text-sm font-semibold text-white hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500">
                                        Ajouter au panier
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</x-layout>

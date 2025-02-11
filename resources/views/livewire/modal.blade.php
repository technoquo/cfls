<!-- Modal Component -->
<div x-data="{ 
    open: {{ $this->showModal ? 'true' : 'false' }}, 
    videoSrc: '{{ $this->videoSrc }}'
}" 
class="max-w-sm bg-white rounded-lg dark:bg-gray-800" >

    <!-- Button to Open Modal -->
    <button type="button" @click="open = true" 
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z" />
        </svg>
    </button>

    <!-- Overlay & Modal -->
    <div 
         style="display: none;"
         x-show="open" 
         x-transition:enter="transition-opacity ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
        
        <div @click.away="open = false; $refs.vimeo.src = '' ; setTimeout(() => $refs.vimeo.src = videoSrc, 300);" 
             class="bg-white dark:bg-slate-900 p-8 rounded-lg shadow-lg w-[900px] max-w-5xl">
              
            <!-- Vimeo Video -->
            <div class="aspect-w-16 aspect-h-9">
                <iframe 
                    x-ref="vimeo"
                    class="w-full h-[500px] rounded-lg" 
                    :src="videoSrc" 
                    frameborder="0" 
                    allow="autoplay; fullscreen; picture-in-picture" 
                    allowfullscreen>
                </iframe>
                <h1 class="font-bold text-2xl text-center dark:text-white mt-4">{{ $this->message }}</h1>
            </div>

            <!-- Close Button -->
            <div class="text-center mt-4">
                <button @click="open = false; $refs.vimeo.src = ''; setTimeout(() => $refs.vimeo.src = videoSrc, 300);" 
                        class="px-6 py-2 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                          </svg>
                          
                </button>
            </div>
        
        </div>
    </div>
</div>

<div x-data="{ open: false }" class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <img class="rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="" /> 
    <div class="p-5">      
            <h5 class="mb-2 text-[22px] font-bold tracking-tight text-gray-900 dark:text-white">{{ $title }}</h5>
       
        @livewire('modal', ['videoSrc' => 'https://player.vimeo.com/video/'. $vimeoId]) 
    </div>
    <!-- Modal (Controlled by Alpine.js) -->
   
</div>

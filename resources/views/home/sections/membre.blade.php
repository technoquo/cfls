@push('css')
<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
/>
@endpush
<section class="bg-white dark:bg-gray-900  {{ $members->status ? '' : 'hidden' }}"> 
    <div class="max-w-screen-md   mx-auto">        
        <p class="text-gray-700 sm:text-xl dark:text-gray-400 wow animate__animate animate__fadeInDownBig"> {{ $members->subtitle }}</p>
    </div>
    <div class="grid max-w-screen-2xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
       
        <div class="mr-auto place-self-center lg:col-span-7 wow animate__animate animate__bounceInDown">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white uppercase">{{ $members->title }}</h1>
            <div class="max-w-2xl mb-2 font-light text-gray-700 lg:mb-4 md:text-lg lg:text-xl dark:text-gray-400 ">
                {!! $members->description !!}
            </div>
            <a href="{{ asset('storage/' . $members->download) }}"  target="_blank" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                Téléchargement
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
            <a href="{{ asset('storage/' . $members->download) }}" target="_blank" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                  </svg>
                  
            </a> 
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex wow animate__animated animate__backInDown">
            <img src="{{ asset('storage/'. $members->image ) }}" alt="mockup">
        </div>                
    </div>
</section>
</section>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
   
    new WOW({
        boxClass: 'wow', // Clase que activa la animación
        animateClass: 'animate__animated', // Clase de animación de Animate.css
        offset: 100, // Distancia desde la parte inferior de la pantalla para activar la animación
        mobile: true, // Activar en dispositivos móviles
        live: true // Detectar cambios en el DOM y animar elementos añadidos dinámicamente
    }).init()
</script>
@endpush

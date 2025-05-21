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

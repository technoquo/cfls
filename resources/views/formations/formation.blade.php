<x-layout>
    <x-slot name="title">{{ $formation->title }}</x-slot>
    <section class="bg-white dark:bg-gray-900">

        <x-menuformation :slug="$slug" />
        <div
            class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-7xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
            <img class="w-full" src="{{ asset('storage/' . $formation->image) }}" alt="{{ $formation->title }}">

            <div class="mt-6 md:mt-0 px-4 sm:px-6 lg:px-8">
                <!-- Título -->
                <h2 class="mb-4 text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center md:text-left">
                    {{ $formation->title }}
                </h2>

                <!-- Descripción -->
                <div class="mb-6 text-base sm:text-lg md:text-xl lg:text-2xl font-light text-gray-600 dark:text-gray-400 text-justify">
                    {!! $formation->description !!}
                </div>

                <!-- Botón (si existe) -->
                @if ($formation->buttom)
                    <div class="flex justify-center md:justify-start">
                        <a href="{{ $slug }}/calendrier" wire:navigate
                           class="inline-flex items-center gap-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900 font-medium rounded-lg text-lg sm:text-xl md:text-2xl px-5 py-2.5 transition-all duration-200">
                            {{ $formation->buttom }}
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                      clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <div class="mb-16">
            @if (json_decode($formation->info_formation)[0]->title != null)
                <div class="w-full  dark:bg-slate-900">
                    <!-- Tabs -->
                    <div x-data="{
                    selectedId: null,
                    init() {
                        this.$nextTick(() => this.select(this.$id('tab', 1)))
                    },
                    select(id) {
                        this.selectedId = id
                    },
                    isSelected(id) {
                        return this.selectedId === id
                    },
                    whichChild(el, parent) {
                        return Array.from(parent.children).indexOf(el) + 1
                    }
                }" x-id="['tab']" class="w-full mx-auto max-w-screen-2xl">

                        <!-- Tab List -->
                        <ul x-ref="tablist"
                            @keydown.right.prevent.stop="$focus.wrap().next()"
                            @keydown.left.prevent.stop="$focus.wrap().prev()"
                            @keydown.home.prevent.stop="$focus.first()"
                            @keydown.end.prevent.stop="$focus.last()"
                            @keydown.page-up.prevent.stop="$focus.first()"
                            @keydown.page-down.prevent.stop="$focus.last()"
                            role="tablist"
                            class="flex w-full items-stretch gap-2 overflow-x-auto md:overflow-visible px-4 py-2 scroll-smooth whitespace-nowrap -mb-px md:mb-2 scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-transparent">

                            @foreach ($formation->info_formation as $info)
                                <li class="shrink-0 w-auto text-center">
                                    <button
                                        :id="$id('tab', whichChild($el.parentElement, $refs.tablist))"
                                        @click="select($el.id)"
                                        @mousedown.prevent
                                        @focus="select($el.id)"
                                        type="button"
                                        :tabindex="isSelected($el.id) ? 0 : -1"
                                        :aria-selected="isSelected($el.id)"
                                        :class="isSelected($el.id)
                                        ? 'bg-gray-200 dark:bg-gray-600'
                                        : 'border-transparent dark:bg-slate-800'"
                                        class="inline-flex justify-center items-center px-4 py-2 border border-gray-500/50 rounded text-sm md:text-lg lg:text-xl hover:bg-gray-300 dark:text-white dark:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200"
                                        role="tab">
                                        {{ $info->title }}
                                    </button>

                                </li>
                            @endforeach

                        </ul>

                        <!-- Panels -->
                        <div role="tabpanels"
                             class="w-full border text-2xl   dark:bg-slate-900 bg-white rounded-b-lg rounded-tr-lg  dark:text-slate-100">
                            <!-- Panel -->
                            @foreach ($formation->info_formation as $info)
                                <div x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                                         :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))" role="tabpanel"
                                         class="p-8">
                                    <div class="prose prose-lg dark:prose-invert text-black dark:text-white">

                                    {!! $info->description !!}
                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>
                </div>
            @endif

            @php
                $info_course_prive = \App\Models\CoursPrive::where('formations_id', $formation->id)->get();

            @endphp

            @if (isset($info_course_prive) && count($info_course_prive) > 0)
                @foreach ($info_course_prive as $index => $info)
                    @if ($index % 2 == 0)
                        <div class="max-w-screen-2xl px-4 py-8 mx-auto space-y-12">
                            <!-- Row -->
                            <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16 text-base sm:text-lg md:text-xl lg:text-2xl font-light text-gray-600 dark:text-gray-400 text-justify">



                                        {!! $info->description !!}


                                <div>
                                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/' . $info->image) }}"
                                         alt="course prive">
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="max-w-screen-2xl px-4 py-8 mx-auto space-y-12">
                            <!-- Row -->
                            <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
                                <div>
                                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/' . $info->image) }}"
                                         alt="course prive">
                                </div>
                                <div class="text-gray-700 sm:text-lg dark:text-gray-400">

                                    <div class="mb-8 text-base sm:text-lg md:text-xl lg:text-2xl font-light text-gray-600 dark:text-gray-400 text-justify">
                                        {!! $info->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                <div class="flex justify-center items-center py-8">

                    <a href="mailto:info@cfls.be"
                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 text-2xl inline-flex items-center gap-2">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 12C16 14.2091 14.2091 16 12 16C9.79086 16 8 14.2091 8 12C8 9.79086 9.79086 8 12 8C14.2091 8 16 9.79086 16 12ZM16 12V13.5C16 14.8807 17.1193 16 18.5 16V16C19.8807 16 21 14.8807 21 13.5V12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21H16"></path>
                        </svg>
                        Nous contacter
                    </a>
                </div>
                <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                    <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Ils ont fait
                            appel
                            à nous :</h2>

                    </div>
                    <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                        @php
                            $client_prive = \App\Models\ClientPrivate::where('formations_id', $formation->id)->get();

                        @endphp

                        @foreach ($client_prive as $client)
                            <div
                                class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                                <a href="{{ $client->url }}" target="_blank"><img
                                        src="{{ asset('storage/' . $client->image) }}" alt={{ $client->name }}></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-layout>

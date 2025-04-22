<x-layout>
    <x-slot name="title">{{ $formation->title }}</x-slot>
    <section class="bg-white dark:bg-gray-900">

        <x-menuformation :slug="$slug" />
        <div
            class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-7xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
            <img class="w-full" src="{{ asset('storage/' . $formation->image) }}" alt="{{ $formation->title }}">

            <div class="mt-4 md:mt-0">
                <h2 class="mb-4 text-7xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    {{ $formation->title }}</h2>
                <div class="mb-6 font-light text-gray-500 text-lg dark:text-gray-400 md:text-2xl">
                    {!! $formation->description !!}
                </div>
                @if ($formation->buttom != null)
                    <a href="{{ $slug }}/calendrier" wire:navigate
                        class="inline-flex items-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-2xl px-5 py-2.5 text-center dark:focus:ring-primary-900  bg-blue-700 hover:bg-blue-800">
                        {{ $formation->buttom }}
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                @endif
            </div>
        </div>

        @if (json_decode($formation->info_formation)[0]->title != null)
            <div class="w-full md:h-[280px] dark:bg-slate-900 pb-32">
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
                    <ul x-ref="tablist" @keydown.right.prevent.stop="$focus.wrap().next()"
                        @keydown.home.prevent.stop="$focus.first()" @keydown.page-up.prevent.stop="$focus.first()"
                        @keydown.left.prevent.stop="$focus.wrap().prev()" @keydown.end.prevent.stop="$focus.last()"
                        @keydown.page-down.prevent.stop="$focus.last()" role="tablist"
                        class="-mb-px flex w-full items-stretch overflow-x-auto  gap-2 md:mb-2">

                        <!-- Tab -->
                        @foreach ($formation->info_formation as $info)
                            <li class="w-full text-center">
                                <button :id="$id('tab', whichChild($el.parentElement, $refs.tablist))"
                                    @click="select($el.id)" @mousedown.prevent @focus="select($el.id)" type="button"
                                    :tabindex="isSelected($el.id) ? 0 : -1" :aria-selected="isSelected($el.id)"
                                    :class="isSelected($el.id) ? 'bg-gray-200 dark:bg-gray-600' :
                                        'border-transparent dark:bg-slate-800'"
                                    class="w-full inline-flex justify-center px-4 py-2 text-sm whitespace-nowrap border border-gray-500/50 rounded hover:bg-gray-300 dark:bg-gray-100 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 md:text-2xl"
                                    role="tab">{{ $info->title }}</button>
                            </li>
                        @endforeach

                    </ul>

                    <!-- Panels -->
                    <div role="tabpanels"
                        class="w-full border text-2xl   dark:bg-slate-900 bg-white rounded-b-lg rounded-tr-lg  dark:text-slate-100">
                        <!-- Panel -->
                        @foreach ($formation->info_formation as $info)
                            <section x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                                :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))" role="tabpanel"
                                class="p-8">
                                {!! $info->description !!}
                            </section>
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
                        <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
                            <div class="text-gray-700 sm:text-lg dark:text-gray-400">

                                <div class="mb-8 font-medium lg:text-2xl">
                                    {!! $info->description !!}
                                </div>
                            </div>
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

                                <div class="mb-8 font-medium lg:text-2xl">
                                    {!! $info->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            <div class="flex justify-center items-center py-8">

                <a href="mailto:info@cfls.be"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg  px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 text-2xl">Nous
                    contacter</a>
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

        @php
            $info_tables_conversations = \App\Models\TableConversation::where('formations_id', $formation->id)->get();

        @endphp

        @if (isset($info_tables_conversations) && count($info_tables_conversations) > 0)
            <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($info_tables_conversations as $info)
                    @if ($info->status)
                        <div x-data="{ isOpen: {{ $info->open ? 'true' : 'false' }} }">
                            <a x-bind:href="isOpen ? '{{ route('inscription', ['slug' => $slug, 'id'=> $info->id ]) }}' : false"
                                class="flex flex-col items-center rounded-lg border border-gray-200 bg-white px-4 py-2 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700"
                                :class="{ 'cursor-not-allowed opacity-50 pointer-events-none': !isOpen }">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="size-20 dark:text-gray-400 text-gray-600 mb-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                </svg>

                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    @php
                                        $jours = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
                                        $mois = [
                                            1 => 'janvier', 2 => 'février', 3 => 'mars', 4 => 'avril', 5 => 'mai', 6 => 'juin',
                                            7 => 'juillet', 8 => 'août', 9 => 'septembre', 10 => 'octobre', 11 => 'novembre', 12 => 'décembre'
                                        ];
                                        $date = \Carbon\Carbon::parse($info->date_start);
                                        $jourSemaine = $jours[$date->dayOfWeek];
                                        $moisFr = $mois[$date->month];
                                    @endphp
                                    {{ $jourSemaine . ', ' . $date->format('j') . ' ' . $moisFr . ' ' . $date->format('Y') }}
                                </h5>
                                <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">{{ $info->hour_start }} - {{ $info->hour_end }}
                                </p>
                                <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">Prix :
                                    {{ $info->price }}€/séance</p>
                                <div
                                    class="text-white {{ $info->open ? 'bg-csfl hover:bg-cyan-800' : ' bg-red-500' }} focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    {{ $info->open ? 'Inscription' : 'fermé' }}
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif

    </section>
</x-layout>

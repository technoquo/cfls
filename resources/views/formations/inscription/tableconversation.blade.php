<x-layout>
    <x-slot name="title">Inscriptions</x-slot>
    @php
        $jours = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
        $mois = [
            1 => 'janvier',
            2 => 'février',
            3 => 'mars',
            4 => 'avril',
            5 => 'mai',
            6 => 'juin',
            7 => 'juillet',
            8 => 'août',
            9 => 'septembre',
            10 => 'octobre',
            11 => 'novembre',
            12 => 'décembre',
        ];
        $availablesJson = json_encode($availables ?: []);
    @endphp
    <section class="bg-white dark:bg-gray-900" x-data="{
        selectedInscription: {
            date_start: '{{ $inscription->date_start }}',
            hour_start: '{{ $inscription->hour_start }}',
            hour_end: '{{ $inscription->hour_end }}',
            price: '{{ $inscription->price }}'
        },
        availables: {{ $availablesJson }},
        jours: {{ json_encode($jours) }},
        mois: {{ json_encode($mois) }},
        formatDate(dateStr) {
            if (!dateStr) return 'Date non définie';
            const date = new Date(dateStr);
            if (isNaN(date.getTime())) return 'Date invalide';
            const dayOfWeek = this.jours[date.getDay()];
            const day = date.getDate();
            const month = this.mois[date.getMonth() + 1];
            return `${dayOfWeek} ${day} ${month}`;
        }
    }">
        <x-menuformation :slug="$slug" />
        <div class="grid max-w-screen-2xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    Table de conversation</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Afin
                    de poursuivre votre apprentissage, participez à notre atelier "table de conversation", mêlant jeux,
                    communication et discussions sur différents thèmes !</p>

                <p class="max-w-2xl mb-2  text-black font-semibold lg:mb-4 md:text-lg lg:text-xl dark:text-gray-400">
                    Heure et Lieu</p>
                <p class="max-w-2xl  text-black font-semibold  md:text-lg lg:text-xl dark:text-gray-400 ">
                <div>
                    <span x-text="formatDate(selectedInscription.date_start)"></span>,
                    <span x-text="selectedInscription.hour_start || 'N/A'"></span> –
                    <span x-text="selectedInscription.hour_end || 'N/A'"></span>
                </div>
                <div>

                    {{ $company->address }} {{ $company->zip }}, {{ $company->state }}
                </div>
                <div>
                    {{ $inscription->price }}€/séance
                </div>
                </p>

                <a href="#"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center bg-csfl text-white  border border-gray-300 rounded-lg hover:bg-cyan-400 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800 mt-5">
                    Inscription
                </a>
                <div>
                    <form class="mt-8">
                        <label for="inscriptions"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sélectionner une autre
                            date</label>
                        <select id="inscriptions"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            x-on:change="selectedInscription = $event.target.value ? availables.find(item => item.id == $event.target.value) : {
                                date_start: '{{ $inscription->date_start }}',
                                hour_start: '{{ $inscription->hour_start }}',
                                hour_end: '{{ $inscription->hour_end }}',
                                price: '{{ $inscription->price }}'
                            }">
                            <option selected>Choisissez une date</option>
                            @foreach ($availables as $available)
                               @if(($available->open))
                                @php
                                    $date = \Carbon\Carbon::parse($available->date_start);
                                    $jourSemaine = $jours[$date->dayOfWeek];
                                    $moisFr = $mois[$date->month];
                                @endphp
                                <option value="{{ $available->id }}">
                                    {{ $jourSemaine . ' ' . $date->format('j') . ' ' . $moisFr }},
                                    {{ $available->hour_start }} –
                                    {{ $available->hour_end }}</option>
                                 @endif
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ asset('img/formations/Affiche_table_conversation_2025.png') }}" alt="mockup">
            </div>
        </div>
         <!-- Carte Google -->
        <div class="mt-6 flex justify-center">
            <iframe src=" {{ $company->googlemap }}"class="w-full h-64 rounded-lg" loading="lazy"></iframe>
        </div>
    </section>
</x-layout>

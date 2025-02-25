<x-layout>
    <x-slot name="title">{{ $slug }}</x-slot>
    <x-menuformation :slug="$slug" />
    <div class="grid max-w-screen-2xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1
                class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                Vos coordonées
            </h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Vous avez
                déjà un compte ? Connectez-vous pour réserver plus rapidement.
            </p>
            <p class="max-w-2xl mb-2  text-black font-semibold lg:mb-4 md:text-lg lg:text-xl dark:text-gray-400">
                Détails de la réservation
            </p>
            <p class="max-w-2xl  text-black font-semibold  md:text-lg lg:text-xl dark:text-gray-400 ">
            <div>
                Formation accélérée - Carnaval Niv.2
            </div>
            <div>
                Commence le 3 mars 2025 à 09:00
            </div>
            <div>
                Avenue du Four à Briques
            </div>
            <div>
                Anaïs
            </div>
            <div>
                5 séances au total
            </div>
            </p>
            <p class="max-w-2xl mb-2  text-black font-semibold lg:mb-4 md:text-lg lg:text-xl dark:text-gray-400 mt-3">
                Détails du paiement <span class="text-blue-500">175 €</span>
            </p>
            <div>


               <form class="max-w-md mx-auto">
                  <div class="relative z-0 w-full mb-5 group">
                      <input type="email" name="floating_email" id="floating_email"
                          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                          placeholder=" " required />
                      <label for="floating_email"
                          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Adresse
                          e-mail</label>
                  </div>                 
                  <div class="grid md:grid-cols-2 md:gap-6">
                      <div class="relative z-0 w-full mb-5 group">
                          <input type="text" name="floating_first_name" id="floating_first_name"
                              class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                              placeholder=" " required />
                          <label for="floating_first_name"
                              class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prénom</label>
                      </div>
                      <div class="relative z-0 w-full mb-5 group">
                          <input type="text" name="floating_last_name" id="floating_last_name"
                              class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                              placeholder=" " required />
                          <label for="floating_last_name"
                              class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom
                              de famille</label>
                      </div>
                  </div>
                  <div class="grid md:grid-cols-2 md:gap-6">
                      <div class="relative z-0 w-full mb-5 group">
                          <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="floating_phone"
                              id="floating_phone"
                              class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                              placeholder=" " required />
                          <label for="floating_phone"
                              class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Numéro
                              de téléphone </label>
                      </div>
                      <div class="relative z-0 w-full mb-5 group">
                          <input type="text" name="floating_company" id="floating_company"
                              class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                              placeholder=" " required />
                          <label for="floating_company"
                              class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Entreprise
                              (Ex. Google)</label>
                      </div>
                  </div>
                  <button type="submit"
                      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Envoyer</button>
              </form>

            </div>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <img src="{{ asset('img/formations/PHOTO_FORMATION.png') }}" alt="mockup">
        </div>
    </div>
</x-layout>

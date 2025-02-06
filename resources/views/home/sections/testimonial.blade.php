<section class="bg-white dark:bg-gray-900 py-12" x-data="{ active: 0, testimonials: [
    { text: 'Le cours est très intéressant et permet de progresser rapidement. J’ai apprécié l’implication d’Annick et sa patience.', 
      name: 'Micheal Gough', role: 'CEO at Google', 
      image: 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png'
     },
     { text: 'Grâce à Annick, j’ai envie d’aller plus loin et d’apprendre la langue des signes à mes élèves!.', 
      name: 'Micheal Gough', role: 'CEO at Google', 
      image: 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png'
     },
     { text: 'J’aime le fait de gagner en fluidité par le jeu et d’en apprendre plus sur la culture sourde.', 
      name: 'Micheal Gough', role: 'CEO at Google', 
      image: 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png'
     },
     { text: 'Superbe apprentissage de la langue des signes. L’apprentissage est clair et ludique. Annick est très «à l’écoute» de nos demandes et de nos questions. Elle m’a donné envie d’en apprendre plus.', 
      name: 'Micheal Gough', role: 'CEO at Google', 
      image: 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png'
     },
     { text: 'Très enrichissant. On a appris de manière ludique. Tout le monde participait. Formatrice très patiente et répond à toutes nos questions.', 
      name: 'Micheal Gough', role: 'CEO at Google', 
      image: 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png'
     },
     { text: 'Bonne ambiance. Professeur  à l’écoute, explique très bien, prend le temps de répéter et de donner la parole aux étudiants.', 
      image: 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png'
     },
      { text: 'Chouette accueil de la part d’Annick et de ses collègues. Je conseillerai la formation à des amis ou collègues.', 
      image: 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png'
     }


] }" x-init="setInterval(() => active = (active + 1) % testimonials.length, 5000)">

    <div class="max-w-screen-xl px-4 mx-auto overflow-hidden relative">
        <div class="flex transition-transform duration-700 ease-out"
            :style="'transform: translateX(-' + (active * 100) + '%)'">

            <!-- Testimonial Loop -->
            <template x-for="(testimonial, index) in testimonials" :key="index">
                <div class="flex-shrink-0 w-full text-center px-6">
                    <figure class="max-w-screen-md mx-auto">
                        <svg class="h-12 mx-auto mb-3 text-gray-400 dark:text-gray-600" viewBox="0 0 24 27" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z"
                                fill="currentColor" />
                        </svg>
                        <blockquote>
                            <p class="text-2xl font-medium text-gray-900 dark:text-white" x-text="testimonial.text"></p>
                        </blockquote>
                        <figcaption class="flex items-center justify-center mt-6 space-x-3">
                            <img class="w-6 h-6 rounded-full" :src="testimonial.image" alt="profile picture">
                            <div class="flex items-center divide-x-2 divide-gray-500 dark:divide-gray-700">
                                <div class="pr-3 font-medium text-gray-900 dark:text-white" x-text="testimonial.name"></div>
                                <div class="pl-3 text-sm font-light text-gray-500 dark:text-gray-400" x-text="testimonial.role"></div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </template>
        </div>
    </div>
</section>

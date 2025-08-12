
@props(['logo' => null])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ $title ?? 'Centre Francophone de la Langue des Signes' }} - {{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="Cours, publications et recherche en Langue des Signes – CFLS.">
    <link rel="canonical" href="https://cfls.be/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">


    <!-- Open Graph -->
    <meta property="og:title" content="Centre Francophone de la Langue des Signes (CFLS)">
    <meta property="og:description" content="Cours, publications et recherche en Langue des Signes – CFLS.">
    <meta property="og:image" content="https://cfls.be/img/og-cfls-1200x630.jpg">
    <meta property="og:url" content="https://cfls.be/">
    <meta property="og:site_name" content="CFLS asbl">
    <meta property="og:type" content="website">

    <meta name="keywords" content="langue des signes, cours LSF, CFLS, formation LSF, centre francophone, langue des signes Belgique">


    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">

    <!-- Hreflang -->
    <link rel="alternate" href="https://cfls.test/formations" hreflang="fr-BE">
    <link rel="alternate" href="https://cfls.test/formations" hreflang="x-default">

    <!-- Favicon -->
    <link rel="icon" href="https://cfls.be/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="https://cfls.be/apple-touch-icon.png">
    <link rel="manifest" href="https://cfls.be/site.webmanifest">
    <meta name="google-site-verification" content="xbePHPB9fX0-MdmYfI2y4yxummqOUDbrRg99KpkAYUU" />

    <!-- Schema.org -->
    <script type="application/ld+json">
        {
            "@context":"https://schema.org",
            "@type":"Organization",
            "name":"CFLS asbl",
            "url":"https://cfls.be",
            "logo":"https://cfls.be/img/logo_cfls.png"
        }
    </script>
    <script type="application/ld+json">
        {
            "@context":"https://schema.org",
            "@type":"WebSite",
            "url":"https://cfls.be",
            "name":"Centre Francophone de la Langue des Signes",
            "potentialAction":{
                "@type":"SearchAction",
                "target":"https://cfls.be/recherche?q={search_term_string}",
                "query-input":"required name=search_term_string"
            }
        }
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=assistant:200,300,400,500,600,700,800" rel="stylesheet" />

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/ccc950231e.js" crossorigin="anonymous"></script>

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('css')

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-52KWCPNS4C"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-52KWCPNS4C');
    </script>

</head>

<body
    x-data="{
        open: false,
        isOpen: false,
        ...cart()
    }"
    :class="{ 'overflow-hidden': open || isOpen }"
    @add-to-cart.window="addToCart($event.detail.id, $event.detail.quantity, $event.detail.choix)"
    class="sm:overflow-auto dark:bg-slate-900"
>

     @include('layouts.includes.navegation', ['logo' => $logo])
     @include('layouts.includes.sidebar')
     @include('components.slide-over')





    <div
        class="border-gray-200 border-dashed rounded-lg dark:border-gray-70">
        {{ $slot }}
    </div>


    <div x-cloak x-on:click="open = false" x-show="open"
        class="bg-gray-900 bg-opacity-50 fixed inset-0 z-30 sm:hidden"></div>


       @include('layouts.includes.footer', ['logo' => $logo ])


       @stack('modals')

        @stack('scripts')

        @livewireScripts


     <x-top/>
     <!-- Banner de preferencias de accesibilidad -->
     <div id="accessibility-banner" style="display: none;"
          class="fixed bottom-4 right-4 max-w-sm p-4 bg-white border border-gray-300 rounded-lg shadow-lg z-50 dark:bg-gray-800 dark:border-gray-700">

         <h2 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">Gérer vos préférences de cookies</h2>
         <p class="text-sm mb-4 text-gray-800 dark:text-gray-100">
             Nous utilisons des cookies pour améliorer votre expérience de navigation, analyser le trafic et personnaliser les publicités.
             Vous pouvez personnaliser vos choix ci-dessous. Les cookies essentiels seront activés quelle que soit votre décision.
         </p>

         <div class="mb-4">
             <label for="theme" class="block text-sm font-medium text-gray-800 dark:text-gray-100">Thème:</label>
             <select id="theme" class="w-full mt-1 border rounded p-1 dark:bg-gray-700 dark:text-white">
                 <option value="light">Clair</option>
                 <option value="dark">Sombre</option>
             </select>
         </div>

         <div class="flex justify-end gap-2">
             <button onclick="hideBanner()" class="px-3 py-1 border rounded bg-gray-200 hover:bg-gray-300 dark:bg-gray-600 dark:hover:bg-gray-500">
                 Annuler
             </button>
             <button onclick="savePreferences()" class="px-3 py-1 border rounded bg-blue-600 text-white hover:bg-blue-700">
                 OK
             </button>
         </div>
     </div>

     @push('scripts')
         <script>
             document.addEventListener('alpine:init', () => {
                 Alpine.store('cart', {
                     items: JSON.parse(localStorage.getItem('cart')) || [],
                     get count() {
                         return this.items.reduce((sum, item) => sum + item.quantity, 0);
                     },
                     add(product) {
                         const existing = this.items.find(p => p.id === product.id);
                         if (existing) {
                             existing.quantity += product.quantity;
                         } else {
                             this.items.push(product);
                         }
                         this.save();
                     },
                     save() {
                         localStorage.setItem('cart', JSON.stringify(this.items));
                         window.dispatchEvent(new CustomEvent('cart-updated'));
                     }
                 });
             });
         </script>

         <script>
             function cart() {
                 return {
                     items: [],
                     total: 0,
                     isOpen: false,
                     selectedProductId: null,
                     productDetails: null,
                     notification: '',

                     init() {
                         const saved = localStorage.getItem('cart');
                         const total = localStorage.getItem('cart-total');
                         if (saved) this.items = JSON.parse(saved);
                         if (total) this.total = parseFloat(total);
                         this.items.forEach(i => i.totalPrice = i.price * i.quantity);

                         window.addEventListener('open-slide-over', async (e) => {

                             this.isOpen = true;
                             this.selectedProductId = e.detail?.id ?? null;
                             if (this.selectedProductId) await this.loadProductDetails(this.selectedProductId);
                         });
                     },

                     async loadProductDetails(id) {
                         const res = await fetch(`/api/product/${id}`);
                         this.productDetails = await res.json();
                     },

                     async addToCart(productId, quantity = 1) {
                         const existing = this.items.find(i => i.id === productId);
                         if (existing) {
                             existing.quantity += quantity;
                         } else {
                             const res = await fetch(`/api/product/${productId}`);
                             const data = await res.json();

                             this.items.push({
                                 id: data.id,
                                 name: data.name,
                                 slug: data.slug,
                                 price: parseFloat(data.price),
                                 image: data.images?.[0]?.image_path ? `/storage/${data.images[0].image_path}` : '/img/default.jpg',
                                 quantity,
                                // totalPrice: data.price * quantity,
                             });
                         }
                         this.updateTotal();
                         this.isOpen = true;
                         this.showNotification('Produit ajouté au panier');
                     },

                     updateTotal() {
                         this.total = this.items.reduce((sum, i) => sum + i.price * i.quantity, 0);
                         this.items.forEach(i => i.totalPrice = i.price * i.quantity);
                         localStorage.setItem('cart', JSON.stringify(this.items));
                         localStorage.setItem('cart-total', this.total.toFixed(2));
                         window.dispatchEvent(new CustomEvent('cart-updated'));
                     },

                     showNotification(msg) {
                         this.notification = msg;
                         setTimeout(() => this.notification = '', 3000);
                     },

                     clearCart() {
                         this.items = [];
                         this.total = 0;
                         localStorage.removeItem('cart');
                         localStorage.removeItem('cart-total');
                         window.dispatchEvent(new CustomEvent('cart-updated'));
                         setTimeout(() => this.isOpen = false, 3000);
                     },
                 };
             }
         </script>
         <script>
             // On page load or when changing themes, best to add inline in `head` to avoid FOUC
             if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                 document.documentElement.classList.add('dark')
             } else {
                 document.documentElement.classList.remove('dark')
             }
         </script>

     @endpush

     <script>
         function getAccessibilityCookie() {
             const name = 'accessibility_preferences=';
             const decodedCookie = decodeURIComponent(document.cookie);
             const cookies = decodedCookie.split(';');

             for (let i = 0; i < cookies.length; i++) {
                 let c = cookies[i].trim();
                 if (c.indexOf(name) === 0) {
                     try {
                         return JSON.parse(c.substring(name.length));
                     } catch (e) {
                         console.error('Erreur de cookie:', e);
                         return null;
                     }
                 }
             }
             return null;
         }

         function hideBanner() {
             document.getElementById('accessibility-banner').style.display = 'none';
         }

         function savePreferences() {
             const themeElement = document.getElementById('theme');
             if (!themeElement) {
                 console.error('❌ Élément #theme introuvable');
                 return;
             }

             const darkMode = themeElement.value === 'dark';

             const preferences = {
                 dark_mode: darkMode
             };

             const expires = new Date();
             expires.setFullYear(expires.getFullYear() + 1);

             document.cookie = `accessibility_preferences=${encodeURIComponent(JSON.stringify(preferences))}; expires=${expires.toUTCString()}; path=/; SameSite=Lax`;

             localStorage.setItem('color-theme', darkMode ? 'dark' : 'light');

             location.reload();
         }

         document.addEventListener('DOMContentLoaded', () => {
             const prefs = getAccessibilityCookie();

             if (!prefs) {
                 document.getElementById('accessibility-banner').style.display = 'block';
             } else {
                 localStorage.setItem('color-theme', prefs.dark_mode ? 'dark' : 'light');
             }

             const html = document.documentElement;
             const theme = localStorage.getItem('color-theme');

             if (theme === 'dark') {
                 html.classList.add('dark');
                 html.classList.remove('light');
             } else {
                 html.classList.add('light');
                 html.classList.remove('dark');
             }
         });
     </script>

</body>

</html>

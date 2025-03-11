<x-layout>
    <x-slot name="title">Liste de Syllabus</x-slot>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }
        .main-container {
            display: flex;
            gap: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .video-section {
            flex: 2;
            min-width: 0;
        }
        .current-word {
            font-size: 28px;
            font-weight: bold;
            color: #3498db;
            margin-bottom: 15px;
            text-align: center;
        }
        .video-wrapper {
            position: relative;
            padding-bottom: 56.25%; /* Relación 16:9 */
            height: 0;
            overflow: hidden;
            border-radius: 6px;
        }
        .video-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        .word-section {
            flex: 1;
            overflow-y: auto;
            max-height: 500px;
            border-left: 1px solid #e0e0e0;
            padding-left: 20px;
        }
        .word-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .word {
            padding: 12px 15px;
            background-color: #ecf0f1;
            border-radius: 6px;
            color: #7f8c8d;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .word:hover {
            background-color: #d5dbdb;
        }
        .word.active {
            background-color: #3498db;
            color: white;
            font-weight: bold;
        }
        .word-section-title {
            position: sticky;
            top: 0;
            background-color: white;
            padding: 10px 0;
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }
        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
            }
            .word-section {
                border-left: none;
                border-top: 1px solid #e0e0e0;
                padding-left: 0;
                padding-top: 20px;
                max-height: 200px;
            }
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://player.vimeo.com/api/player.js"></script>
</head>
<body>

    
    <div class="main-container">
        <div class="video-section">
            <h1>Vimeo</h1>
            <div class="current-word" id="currentWord">Végétarien</div>
            <div class="video-wrapper" id="videoWrapper">
                <!-- El iframe de Vimeo se insertará aquí dinámicamente -->
            </div>
        </div>
        
        <div class="word-section">
            <div class="word-section-title">Liste des vocabulaires</div>
            <div class="word-list" id="wordList">
                <!-- Las palabras se generarán dinámicamente -->
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            // Crear una lista de ejemplo con muchas palabras
            const wordsList = [
                "Végétarien", "Sucre en poudre", "Sel", "Saucisse", "Mayonnaise (2)", "Sauce", "Purée", "Oeuf (2)",
                "Moins cher","Légume","Ketchup", "Frites (2)"
            ];
            
            // IDs de videos de Vimeo (ejemplos, reemplazar con IDs reales)
            // Aquí solo se usan 8 IDs que se repetirán para el ejemplo
            const vimeoBaseIds = [
                "1047122935", "1047122905", "1047122880", "1047122856", 
                "1047122718", "1047122829", "1047122800", "1047122758",
                "1047122736", "1047122698", "1047122665", "1047122638"
            ];
            
            // Generar IDs de Vimeo para todas las palabras (para demostración)
            const vimeoVideos = {};
            wordsList.forEach((word, index) => {
                vimeoVideos[word] = vimeoBaseIds[index % vimeoBaseIds.length];
            });
            
            // Generar la lista de palabras en el DOM
            const $wordList = $('#wordList');
            wordsList.forEach((word, index) => {
                $wordList.append(`<div class="word" data-id="${index}">${word}</div>`);
            });
            
            // Seleccionar la primera palabra como activa
            $('.word[data-id="0"]').addClass('active');
            
            let currentIndex = 0;
            let player = null;
            let repetitionCount = 1; // Contador para la repetición
            const maxRepetitions = 2; // Número de veces que se repetirá cada video
            
            // Crear el reproductor de Vimeo
            function createPlayer(videoId) {
                // Limpiar el contenedor
                $('#videoWrapper').empty();
                
                // Crear un nuevo elemento iframe
                const iframe = $('<iframe>', {
                    src: `https://player.vimeo.com/video/${videoId}?autoplay=1&loop=0&autopause=0&muted=1`,
                    allow: 'autoplay; fullscreen',
                    allowfullscreen: true
                });
                
                // Añadir iframe al contenedor
                $('#videoWrapper').append(iframe);
                
                // Inicializar nuevo reproductor de Vimeo
                player = new Vimeo.Player(iframe[0]);
                
                // Configurar eventos del reproductor
                player.on('ended', function() {
                    handleVideoEnd();
                });
                
                // Actualizar indicador de repetición
                $('#repetitionIndicator').text(`Reproducción ${repetitionCount} de ${maxRepetitions}`);
                
                return player;
            }
            
            // Manejar el final de un video
            function handleVideoEnd() {
                if (repetitionCount < maxRepetitions) {
                    // Si no ha alcanzado el máximo de repeticiones, reproducir el mismo video otra vez
                    repetitionCount++;
                    const currentWord = wordsList[currentIndex];
                    createPlayer(vimeoVideos[currentWord]);
                } else {
                    // Si ya se ha reproducido las veces requeridas, avanzar al siguiente video
                    changeToNextWord();
                }
            }
            
            // Cambiar a la siguiente palabra
            function changeToNextWord() {
                // Reiniciar contador de repeticiones
                repetitionCount = 1;
                
                // Avanzar al siguiente índice
                currentIndex = (currentIndex + 1) % wordsList.length;
                updateWord();
            }
            
            // Actualizar la palabra actual y el video
            function updateWord() {
                const currentWord = wordsList[currentIndex];
                
                // Actualizar texto
                $('#currentWord').text(currentWord);
                
                // Actualizar clases en la lista de palabras
                $('.word').removeClass('active');
                const $activeWord = $(`.word[data-id="${currentIndex}"]`).addClass('active');
                
                // Desplazar automáticamente a la palabra activa
                const $wordSection = $('.word-section');
                $wordSection.animate({
                    scrollTop: $activeWord.offset().top - $wordSection.offset().top + $wordSection.scrollTop() - 100
                }, 500);
                
                // Reiniciar contador de repeticiones
                repetitionCount = 1;
                $('#repetitionIndicator').text(`Reproducción ${repetitionCount} de ${maxRepetitions}`);
                
                // Crear/Actualizar reproductor con el nuevo video
                createPlayer(vimeoVideos[currentWord]);
            }
            
            // Iniciar con la primera palabra
            updateWord();
            
            // Permitir clic en palabras para cambiar manualmente
            $(document).on('click', '.word', function() {
                const newIndex = $(this).data('id');
                if (newIndex !== currentIndex) {
                    currentIndex = newIndex;
                    repetitionCount = 1; // Reiniciar contador de repeticiones
                    updateWord();
                }
            });
        });
    </script>
</x-layout>
    
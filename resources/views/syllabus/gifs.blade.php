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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .video-section {
            flex: 2;
            min-width: 0;
            text-align: center;
        }

        .current-word {
            font-size: 28px;
            font-weight: bold;
            color: #3498db;
            margin-bottom: 15px;
        }

        .gif-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 300px;
            overflow: hidden;
            border-radius: 6px;
        }

        .gif-wrapper img {
            max-width: 100%;
            max-height: 100%;
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

        .controls {
            margin-top: 15px;
            text-align: center;
        }

        .controls button {
            padding: 10px 15px;
            font-size: 16px;
            border: none;
            background-color: #3498db;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            transition: background 0.2s;
        }

        .controls button:hover {
            background-color: #2980b9;
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
    </head>

    <body>
        <div class="main-container">
            <h1>Gifs</h1>
            <div class="video-section">
                <div class="current-word" id="currentWord">Végétarien</div>
                <div class="gif-wrapper" id="gifWrapper"></div>
                <div class="controls">
                    <button id="pauseButton">Pause</button>
                </div>
            </div>
            <div class="word-section">
                <div class="word-section-title">Liste des vocabulaires</div>
                <div class="word-list" id="wordList"></div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                const wordsList = [
                    "Végétarien", "Sucre en poudre"
                ];

                const gifUrls = {!! json_encode([
                    'Végétarien' => asset('gif/Végétarien.gif'),
                    'Sucre en poudre' => asset('gif/Sucre en poudre.gif'),
                ]) !!};

                const $wordList = $('#wordList');
                wordsList.forEach((word, index) => {
                    $wordList.append(`<div class="word" data-id="${index}">${word}</div>`);
                });

                $('.word[data-id="0"]').addClass('active');
                let currentIndex = 0;
                let repeatCount = 0;
                let isPaused = false;
                let timeoutId;

                function updateWord() {
                    if (isPaused) return;

                    const currentWord = wordsList[currentIndex];
                    $('#currentWord').text(currentWord);
                    $('.word').removeClass('active');
                    const $activeWord = $(`.word[data-id="${currentIndex}"]`).addClass('active');

                    const $wordSection = $('.word-section');
                    $wordSection.animate({
                        scrollTop: $activeWord.offset().top - $wordSection.offset().top + $wordSection.scrollTop() - 100
                    }, 500);

                    $('#gifWrapper').html(`<img src="${gifUrls[currentWord]}" alt="${currentWord}">`);

                    // Si el GIF ya se repitió dos veces, pasa al siguiente
                    if (repeatCount < 1) {
                        repeatCount++;
                    } else {
                        repeatCount = 0;
                        currentIndex = (currentIndex + 1) % wordsList.length;
                    }

                    timeoutId = setTimeout(updateWord, 3000);
                }

                updateWord();

                $(document).on('click', '.word', function () {
                    const newIndex = $(this).data('id');
                    if (newIndex !== currentIndex) {
                        currentIndex = newIndex;
                        repeatCount = 0;
                        updateWord();
                    }
                });

                $('#pauseButton').click(function () {
                    if (isPaused) {
                        isPaused = false;
                        $(this).text('Pause');
                        updateWord();
                    } else {
                        isPaused = true;
                        $(this).text('Reanudar');
                        clearTimeout(timeoutId);
                    }
                });
            });
        </script>
</x-layout>

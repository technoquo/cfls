<div>
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

    <div class="main-container">
        <div class="video-section">
            <h1>Vimeo</h1>
            <div class="current-word">{{ $wordsList[$currentIndex] }}</div>
            <div class="video-wrapper">
                <iframe 
                    src="https://player.vimeo.com/video/{{ $vimeoVideos[$wordsList[$currentIndex]] }}?autoplay=1&loop=0&autopause=0" 
                    allow="autoplay; fullscreen" 
                    allowfullscreen
                ></iframe>
            </div>
        </div>
        
        <div class="word-section">
            <div class="word-section-title">Liste des vocabulaires</div>
            <div class="word-list">
                @foreach($wordsList as $index => $word)
                    <div 
                        class="word {{ $currentIndex == $index ? 'active' : '' }}" 
                        wire:click="selectWord({{ $index }})"
                        wire:navigate
                    >
                        {{ $word }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
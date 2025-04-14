<!DOCTYPE html>
<html>
<head>
    <title>Videos en carpeta</title>
</head>
<body>


@if (count($videos) > 0)
    @foreach ($videos as $video)
        <div style="margin-bottom: 20px;">
            <p><strong>{{ $video['public_id'] }}</strong></p>
            <video width="320" height="240" controls>
                <source src="{{ $video['secure_url'] }}" type="video/mp4">
                Tu navegador no soporta el video.
            </video>
        </div>
    @endforeach
@else
    <p>No hay videos en esta carpeta.</p>
@endif
</body>
</html>

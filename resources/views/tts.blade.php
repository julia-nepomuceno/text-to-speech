<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Texto para Fala</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            text-align: center;
            margin-top: 100px;
        }
        form {
            background: white;
            padding: 30px;
            display: inline-block;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, button {
            padding: 10px;
            margin-top: 10px;
            width: 300px;
            font-size: 16px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        audio {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Conversor de Texto em Voz 🎤</h1>

    <form action="{{ route('speak') }}" method="POST">
        @csrf
        <input type="text" name="text" placeholder="Digite algo..." value="{{ $text ?? '' }}" required>
        <br>
        <button type="submit">Gerar Áudio</button>
    </form>

    @if(!empty($audioUrl))
        <h3>Reproduzindo: "{{ $text }}"</h3>
        <audio controls autoplay>
            <source src="{{ $audioUrl }}" type="audio/mpeg">
            Seu navegador não suporta o áudio.
        </audio>
    @endif
</body>
</html>

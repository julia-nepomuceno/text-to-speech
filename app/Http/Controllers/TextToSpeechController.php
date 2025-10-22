<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class TextToSpeechController extends Controller
{
    public function index()
    {
        return view('tts');
    }

    public function speak(Request $request)
    {
        $text = $request->input('text');

        // url
        $url = "https://translate.google.com/translate_tts?ie=UTF-8&q=" . urlencode($text) . "&tl=pt-BR&client=tw-ob";

        // navegador simulado
        $client = new Client([
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
            ]
        ]);

        try {
            // audio
            $response = $client->get($url);

            // arquivo
            Storage::disk('public')->put('audio.mp3', $response->getBody());

            // link
            $audioUrl = asset('storage/audio.mp3');

            return view('tts', [
                'audioUrl' => $audioUrl,
                'text' => $text
            ]);

        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao gerar áudio: ' . $e->getMessage());
        }
    }
}

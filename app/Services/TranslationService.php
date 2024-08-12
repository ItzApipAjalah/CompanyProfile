<?php
// app/Services/TranslationService.php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class TranslationService
{
    protected $apiUrl = 'https://api.mymemory.translated.net/get';

    public function translate($text, $sourceLang = 'id', $targetLang = 'en')
    {
        $response = Http::get($this->apiUrl, [
            'q' => $text,
            'langpair' => "$sourceLang|$targetLang",
        ]);

        if ($response->successful()) {
            return $response->json()['responseData']['translatedText'];
        }

        return $text; // Return original text if translation fails
    }
}

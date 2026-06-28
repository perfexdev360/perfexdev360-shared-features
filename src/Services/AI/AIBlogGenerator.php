<?php

namespace Perfexdev360\SharedFeatures\Services\AI;

use Illuminate\Support\Facades\Http;
use Perfexdev360\SharedFeatures\Contracts\AIGeneratorInterface;

class AIBlogGenerator implements AIGeneratorInterface
{
    protected string $apiKey;
    protected string $model;
    protected string $provider;

    public function __construct()
    {
        $this->provider = config('shared-features.ai_blogging.provider', 'openai');
        $this->apiKey = config('shared-features.ai_blogging.api_key');
        $this->model = config('shared-features.ai_blogging.model', 'gpt-4');
    }

    /**
     * Generate a blog article.
     *
     * @param string $prompt
     * @return string|null
     */
    public function generateArticle(string $prompt): ?string
    {
        // For simplicity, we assume OpenAI here if provider is 'openai'
        if ($this->provider === 'openai') {
            return $this->callOpenAI($prompt);
        }

        // Add other providers (Gemini, Anthropic) as needed
        return null;
    }

    protected function callOpenAI(string $prompt): ?string
    {
        $response = Http::withToken($this->apiKey)
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => $this->model,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are an expert blog writer.',
                    ],
                    [
                        'role' => 'user',
                        'content' => $prompt,
                    ],
                ],
                'temperature' => 0.7,
            ]);

        if ($response->successful()) {
            return $response->json('choices.0.message.content');
        }

        return null;
    }
}

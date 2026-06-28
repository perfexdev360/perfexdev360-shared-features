<?php

namespace Perfexdev360\SharedFeatures\Services\WhatsApp;

use Illuminate\Support\Facades\Http;

class WhatsAppClient
{
    protected string $accessToken;
    protected string $phoneNumberId;
    protected string $apiVersion;
    protected string $baseUrl;

    public function __construct()
    {
        $this->accessToken = config('shared-features.whatsapp.access_token');
        $this->phoneNumberId = config('shared-features.whatsapp.phone_number_id');
        $this->apiVersion = config('shared-features.whatsapp.api_version', 'v17.0');
        $this->baseUrl = "https://graph.facebook.com/{$this->apiVersion}/{$this->phoneNumberId}/messages";
    }

    /**
     * Send a text message via WhatsApp Cloud API.
     *
     * @param string $to The recipient's phone number.
     * @param string $message The text message to send.
     * @return array|null The JSON response array, or null on failure.
     */
    public function sendTextMessage(string $to, string $message): ?array
    {
        $response = Http::withToken($this->accessToken)->post($this->baseUrl, [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $to,
            'type' => 'text',
            'text' => [
                'preview_url' => false,
                'body' => $message,
            ],
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        // Handle error logging here if necessary
        return null;
    }
}

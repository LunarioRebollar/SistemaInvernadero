<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DiscordNotification extends Controller
{
    public function notification()
    {
        return Http::post('https://discord.com/api/webhooks/848328915881164841/dgewzRbrLaMmchctnkjp_iljirVCKiulWy_xIYs0K-pqWp9IHdN3MeMejY8i2m8qr8eU', [
            'content' => "Learning how to send notifications with DevDojo.com!",
            'embeds' => [
                [
                    'title' => "An awesome new notification!",
                    'description' => "Discord Webhooks are great!",
                    'color' => '7506394',
                ]
            ],
        ]);

    }
}
<?php

namespace App\Http\Livewire;

use Agence104\LiveKit\AccessToken;
use Agence104\LiveKit\AccessTokenOptions;
use Agence104\LiveKit\VideoGrant;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreateAccessTokens extends Component
{
    public string $token;

    /**
     * @throws \Exception
     */
    public function createToken()
    {
        // If this room doesn't exist, it'll be automatically created when the first
        // client joins.
        $roomName = 'Experiments';

        // The identifier to be used for participant.
        $participantName = 'experiment_user';

        // Define the token options.
        $tokenOptions = (new AccessTokenOptions())
            ->setIdentity($participantName);

        // Define the video grants.
        $videoGrant = (new VideoGrant())
            ->setRoomJoin()
            ->setRoomName($roomName);

        // Initialize and fetch the JWT Token.
        $this->token = (new AccessToken('devkey', 'secret'))
            ->init($tokenOptions)
            ->setGrant($videoGrant)
            ->toJwt();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.create-access-tokens');
    }
}

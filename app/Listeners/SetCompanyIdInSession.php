<?php

namespace App\Listeners;

use App\Enums\RoleEnum;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetCompanyIdInSession
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        if (
            $event->user->role_id == RoleEnum::MANAGER ||
            $event->user->role_id == RoleEnum::SELLER
        ) {
            session()->put('company_id', $event->user->seller->company_id);
        } else if ($event->user->role_id == RoleEnum::CLIENT) {
            session()->put('company_id', $event->user->client->company_id);
        }
    }
}

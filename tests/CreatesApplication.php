<?php

namespace Tests;

use App\Models\User;
use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
    function asUser(User $user = null)
    {
        if(!$user) $user = User::factory()->create();

        return test()->actingAs($user);
    }
}

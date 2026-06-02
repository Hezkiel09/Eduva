<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';

use App\Models\User;

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$user = User::find(3) ?? User::first();
if ($user) {
    echo "User ID: " . $user->id . "\n";
    echo "Username: " . $user->username . "\n";
    echo "Avatar in DB: " . ($user->avatar ?? 'NULL') . "\n";
    echo "Avatar URL: " . $user->avatar_url . "\n";
} else {
    echo "No user found.\n";
}

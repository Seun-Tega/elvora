<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// We need to render the Livewire component itself, not just the view, to see the full layout wrapping
// Wait, we can just hit the URL using HTTP Kernel!
$request = Illuminate\Http\Request::create('/admin/login', 'GET');
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle($request);

file_put_contents('test_login.html', $response->getContent());
echo "Wrote " . strlen($response->getContent()) . " bytes to test_login.html";

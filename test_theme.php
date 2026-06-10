<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$methods = get_class_methods(\Filament\Panel::class);
$themeMethods = array_filter($methods, fn($m) => str_contains(strtolower($m), 'theme') || str_contains(strtolower($m), 'dark'));
print_r($themeMethods);

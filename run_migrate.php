<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

try {
    $status = $kernel->call('migrate', ['--force' => true]);
    echo "Migration Status Code: " . $status . "\n";
    echo "Output: " . $kernel->output() . "\n";
} catch (Exception $e) {
    echo "Migration failed with error: " . $e->getMessage() . "\n";
    echo "Trace: " . $e->getTraceAsString() . "\n";
}

<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Kelas;

try {
    $k = Kelas::create(['namakelas' => 'Tes Otomatis']);
    echo "CREATED: id=" . $k->id . " namakelas=" . $k->namakelas . "\n";
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}

?>
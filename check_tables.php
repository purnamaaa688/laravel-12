<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$kernel = $app->make('Illuminate\Contracts\Console\Kernel');
$kernel->bootstrap();

echo "=== Kelas Table Structure ===\n";
$columns = DB::select('DESCRIBE kelas');
foreach ($columns as $col) {
    echo $col->Field . ' (' . $col->Type . ') ' . $col->Null . "\n";
}

echo "\n=== Guru Table Structure ===\n";
$columns = DB::select('DESCRIBE guru');
foreach ($columns as $col) {
    echo $col->Field . ' (' . $col->Type . ') ' . $col->Null . "\n";
}

echo "\n=== Mapel Table Structure ===\n";
$columns = DB::select('DESCRIBE mapel');
foreach ($columns as $col) {
    echo $col->Field . ' (' . $col->Type . ') ' . $col->Null . "\n";
}
?>

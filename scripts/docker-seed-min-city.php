<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$n = Illuminate\Support\Facades\DB::table('cities')->count();
if ($n === 0) {
    Illuminate\Support\Facades\DB::table('cities')->insert([
        ['city_name' => 'Lomé', 'created_at' => now(), 'updated_at' => now()],
        ['city_name' => 'Kara', 'created_at' => now(), 'updated_at' => now()],
    ]);
    echo "Inserted two default cities (home template expects at least two).\n";
} elseif ($n === 1) {
    Illuminate\Support\Facades\DB::table('cities')->insert([
        'city_name' => 'Kara',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    echo "Inserted second city for home template.\n";
} else {
    echo "Cities already present ({$n}), skipped.\n";
}

if (Illuminate\Support\Facades\DB::table('sitesetting')->count() === 0) {
    Illuminate\Support\Facades\DB::table('sitesetting')->insert([
        'phone_one' => null,
        'phone_two' => null,
        'email_one' => null,
        'email_two' => null,
        'company_name' => 'Tedia-investisment',
        'address_one' => null,
        'address_two' => null,
        'facebook' => null,
        'linkedin' => null,
        'twitter' => null,
        'youtube' => null,
        'instagram' => null,
        'pinterest' => null,
        'whatsapp' => null,
        'experience' => '0',
        'project' => '0',
        'award' => '0',
        'clients' => '0',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    echo "Inserted default sitesetting row.\n";
}

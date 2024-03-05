<?php
use Illuminate\Support\Facades\DB;
?>
@include('nav.header')
<main>
    <h1>
        Booked for Destruction
    </h1>
    <?php
    $cars = DB::table('cars')->get();
  /*   $newCar = DB::table('cars')->insert([
        'userID' => 5,
        'regnr' => 'DET 101',
        'pris' => 600,
        'datum' => '2024-05-01'
]); */
    foreach ($cars as $car) : ?>
    <p>Reg. No: <?= $car->regnr ?> - Date: <?= $car->datum ?></p>

    <?php endforeach; ?>
</main>
@include('nav.footer')

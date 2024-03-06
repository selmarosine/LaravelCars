@php
    use Illuminate\Support\Facades\DB;

    $cars = DB::table('cars')->get();
@endphp
@include('nav.header')
<main>
    <h1>
        Booked for Destruction
    </h1>
    <?php
  /*   $newCar = DB::table('cars')->insert([
        'userID' => 5,
        'regnr' => 'DET 101',
        'pris' => 600,
        'datum' => '2024-05-01'
]); */
    foreach ($cars as $car) : ?>
    <p>Reg. No: <?= $car->regnr ?> - Date: <?= $car->datum ?></p>

    <?php endforeach; ?>
    <a href="/">Back to Start</a>
    <div class="addCarFormContainer">
        <h3>Schedule a car for destruction</h3>
        {{-- Added method to CheckBookingController and route to web.php --}}
        <form action="{{ route('schedule.car') }}" method="POST">
            @csrf
            <label for="name">User ID:</label>
            <input type="number" name="userID" id="name">
            <label for="regNo">Reg Number</label>
            <input type="text" name="regNo" id="regNo">
            <label for="date">Select Date</label>
            <input type="date" name="date" id="date">
            <button type="submit" name="addCar">Schedule Destruction</button>
        </form>
    </div>
</main>
@include('nav.footer')

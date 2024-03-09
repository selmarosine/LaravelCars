@php
    use Illuminate\Support\Facades\DB;

    $cars = DB::table('cars')->get();
@endphp

@include('nav.header')
<main>
    <h2>
        Booked for Destruction
    </h2>
    {{-- Shows message to user if a booked destruction is successfully cancelled --}}
    @if (session('success'))
        <div class="alertMsg">
            <p>{{ session('success') }}</p>
        </div>
    @endif
    {{-- Shows error msg if something went wrong, ie. reg number was not found in database --}}
    @if (session('error'))
        <div class="alertMsg">
            <p>{{ session('error') }}</p>
        </div>
    @endif

    @foreach ($cars as $car)
        <div class="scheduledCar">
            <p><span class="bold">User ID: </span>{{ $car->userID }} - <span class="bold">Reg. No:</span>
                {{ $car->regnr }} - <span class="bold">Date:</span>
                {{ $car->datum }}</p>
            <div class="carOptions">
                <dialog class="changeDateBox">
                    <div class="dateBoxContents">
                        <button class="closeChangeDate">X</button>
                        <form action="{{ route('update.date', $car->regnr) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="date">Select new date</label>
                            <input type="date" name="date" id="date">
                            <button type="submit">Change Date</button>
                        </form>
                    </div>
                </dialog>
                <button class="showChangeDate">Change Date</button>
                <form action="{{ route('delete.car', $car->regnr) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Cancel Destruction</button>
                </form>
            </div>
        </div>
    @endforeach
    <div class="addCarFormContainer">
        <h3>Schedule a car for destruction</h3>
        {{-- Added method to CheckBookingController and route to web.php --}}
        {{-- userID should be a hidden field with logged in user's ID as default value --}}
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
    <!--<a href="/">Back to Start</a>-->
    <a href="/">Sign out</a>
</main>
@include('nav.footer')

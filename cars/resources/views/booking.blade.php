@php
    use Illuminate\Support\Facades\DB;

    $cars = DB::table('cars')->get();
@endphp
@include('nav.header')

<h1 class="bookTitle">Time to book some scrapping!</h1>
<div class="bookSide">

<form class="bookForm" method="POST" action="{{ route('new.book') }}">
    @csrf
    <div><label for="regNumber">Reg number:</label>
    <input type="text" name="regNumber" id="regNumber" value="{{ session('regNo') }}"></div>

    <div><label for="date">Date:</label>
    <input type="date" id="date" name="date" min="2024-03-01"></div>

    <h2>Create an account:</h2>

    <div><label for="createUser">Create username:</label>
    <input type="text" name="createUser" id="createUser"></div>

    <div><label for="createPassword">Create password:</label>
    <input type="password" name="createPassword" id="createPassword"> </div>

    <div><button type="submit">Book scrap</button></div>
</form>

<div class="bookBackButton"><a href="/">Back to start</a></div>

</div>

@include('nav.footer')
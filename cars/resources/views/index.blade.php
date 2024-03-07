<?php
use Illuminate\Support\Facades\DB;
?>
@include('nav.header')
<main>
    <h1>
        Car Destruction
    </h1>
    <form action="{{ url('/book') }}" method="GET">
        <label for="regNo">Enter Reg Number:</label>
        <input type="text" id="regNo">
        <button type="submit" name="submitReg">Submit</button>
    </form>

    @php
    $regNo = $_POST['regNo'];
    @endphp

    <a href="show">Show List</a>
    <div style="margin-top: 55px;">
        <h3>Already have an account? Sign in:</h3>
        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="namn" name="name">
            <div><label for="password">Password:</label>
                <input name="password" type="password" id="password">
            </div>
            <div><button type="submit" name="submitLogin">Log in</button></div>
        </form>
    </div>
</main>
@include('nav.footer')

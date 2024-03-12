<?php

use Illuminate\Support\Facades\DB;
?>
@include('nav.header')
<h1 class="indexTitle">
    Car Destruction
</h1>

<main class="indexMain">
    @if (session('error'))
        <div class="alert alert-danger">
            <p>{{ session('error') }}</p>
        </div>
    @endif
    <div class="indexReg">
        <h3 class="indexH3">New here?</h3>
        <form action="{{ route('submit.form') }}" method="POST">
            @csrf
            <div><label for="regNo">Enter Reg Number:</label></div>
            <input type="text" id="regNo" name="regNo">
            <div><button type="submit" name="submitReg">Continue</button></div>
        </form>
    </div>

    <div class="indexLogin">
        <h3 class="indexH3">Login:</h3>
        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <div><label for="name">Name:</label></div>
            <input type="text" id="namn" name="name">
            <div><label for="password">Password:</label></div>
            <div><input name="password" type="password" id="password">
            </div>
            <div><button type="submit" name="submitLogin">Log in</button></div>
        </form>
    </div>

</main>
@include('nav.footer')

<?php

use Illuminate\Support\Facades\DB;
?>
@include('nav.header')
<h1 class="indexTitle">
    Car Destruction
</h1>
<main class="indexMain">
    <form action="{{ route('submit.form') }}" method="POST" class="indexReg">
        @csrf
        <label for="regNo">Enter Reg Number:</label>
        <input type="text" id="regNo" name="regNo">
        <button type="submit" name="submitReg">Submit</button>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </form>

    <div class="indexLogin">
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
<a href="show">Show List</a>
@include('nav.footer')
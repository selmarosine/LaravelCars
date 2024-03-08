<?php

?>
@include('nav.header')
<h1>Time to book some scrapping!</h1>

<form>
    <div><label for="regNumber">Reg number:</label>
    <input type="text" name="regNumber" id="regNumber" value="{{ session('regNo') }}"></div>

    <!--ändra detta sen-->
    <div><label for="price">Price:</label>
    <input type="text" name="price" id="price" value="500"></div>

    <div><label for="date">Date:</label>
    <input type="date" id="date" name="date" min="2024-03-01"></div>

    <h2>Create an account:</h2>

    <div><label for="createUser">Create username:</label>
    <input type="text" name="createUser" id="createUser"></div>

    <div><label for="createPassword">Create password:</label>
    <input type="password" name="createPassword" id="createPassword"> </div>

    <div><button type="submit">Book scrap</button></div>
</form>

@include('nav.footer')
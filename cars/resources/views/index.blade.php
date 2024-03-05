@include('nav.header')
<main>
    <h1>
        Car Destruction
    </h1>
    <form action="/" method="POST">
        <label for="regNo">Enter Reg Number:</label>
        <input type="text" id="regNo">
        <button type="submit" name="submitReg">Submit</button>
    </form>

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

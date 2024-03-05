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
</main>
@include('nav.footer')

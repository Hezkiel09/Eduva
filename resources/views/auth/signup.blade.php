<h1>Register</h1>

<form method="POST" action="/register">
    @csrf

    <input type="text" name="name" placeholder="name">
    <br><br>

    <input type="text" name="username" placeholder="username ">
    <br><br>

    <input type="email" name="email" placeholder="email ">
    <br><br>

    <input type="password" name="password" placeholder="password">
    <br><br>

    <button type="submit">Register</button>
</form>
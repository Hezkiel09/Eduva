<h1>Dashboard</h1>

<p>Halo, {{ auth()->user()->username }}</p>

<form method="POST" action="/logout">
    @csrf
    <button type="submit">Logout</button>
</form>
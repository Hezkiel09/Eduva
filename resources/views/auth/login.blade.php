<h1>Login</h1>

@if ($errors->any())
    <div style="color: red; margin-bottom: 10px;">
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </div>
@endif

<form method="POST" action="/login">
    @csrf
    <input type="text" name="username" placeholder="username" value="{{ old('username') }}" required>
    <br><br>

    <input type="password" name="password" placeholder="password" required>
    <br><br>

    <button type="submit">Login</button>
</form>
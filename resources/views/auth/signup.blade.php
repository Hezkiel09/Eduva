<h1>Signup</h1>

@if ($errors->any())
    <div style="color: red; margin-bottom: 10px;">
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </div>
@endif

<form method="POST" action="/register">
    @csrf
    <input type="text" name="username" placeholder="username" value="{{ old('username') }}" required>
    <br><br>

    <input type="email" name="email" placeholder="email" value="{{ old('email') }}" required>
    <br><br>

    <input type="password" name="password" placeholder="password" required>
    <br><br>

    <button type="submit">Register</button>
</form>
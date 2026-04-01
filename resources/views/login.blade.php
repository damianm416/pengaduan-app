<h2>Login</h2>

<form method="POST" action="/login">
    @csrf
    <input type="text" name="username" placeholder="Username / NIS">
    <input type="password" name="password" placeholder="Password (admin only)">
    <button type="submit">Login</button>
</form>
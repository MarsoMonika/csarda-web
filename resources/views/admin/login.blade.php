<form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf
    <input type="text" name="username" placeholder="username">
    <input type="password" name="password" placeholder="Admin jelszó">
    <button type="submit">Belépés</button>
</form>

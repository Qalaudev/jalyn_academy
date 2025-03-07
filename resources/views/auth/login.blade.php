<form action="{{ route('authenticate') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <button type="submit">Кіру</button>
</form>

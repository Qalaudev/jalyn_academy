<form action="{{ route('authorization') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Аты" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <button type="submit">Тіркелу</button>
</form>

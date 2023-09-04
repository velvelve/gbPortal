<br>
<h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
<br>
@if (Auth::user()->is_admin === true)
    <a href="{{ route('admin.index') }}">В админку</a>
@else
    <a href="{{ route('profile.index') }}">Профиль</a>
@endif


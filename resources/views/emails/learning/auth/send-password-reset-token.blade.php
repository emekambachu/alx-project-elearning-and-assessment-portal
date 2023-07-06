<img src="{{ asset('/images/logo.png') }}">

<p>
    Hello {{ $name }}.<br><br>

    <strong>Use this link to reset your password!</strong><br>
    <a href="{{ route('learning.password.reset.token', $token) }}">Password reset</a><br><br>

    To learn more about the program visit <a href="https://brace.afchub.org">brace.afchub.org</a>.
</p>

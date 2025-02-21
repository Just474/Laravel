<form method="post" action={{ route('login.register') }} >
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="password" placeholder="Password">
    <input type="submit">
</form>

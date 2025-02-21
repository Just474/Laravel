<form method="post" action={{ route("login.authentication") }}>
    @csrf
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="password" placeholder="Password">
    <input type="submit">
</form>

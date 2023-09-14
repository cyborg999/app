<html>
    <body>
    <h1>Login</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="/login">
            @csrf
            <label>Email 
                <input type="text" name="email"/>
            </label>
            <label>Password 
                <input type="password" name="password"/>
            </label>
            <input type="submit" value="Login"/>
        </form>
    </body>
</html>
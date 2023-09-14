<html>
    <body>
        <h1>Register</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="/register">
            @csrf
            <input type="text" name="name" placeholder="Name" >
            <input type="email" name="email" placeholder="Email" >
            <input type="password" name="password" placeholder="Password" >
            <button type="submit">Register</button>
        </form>
    </body>
</html>
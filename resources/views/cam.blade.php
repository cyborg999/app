<html>
    <head>
        <style>
            img {
                height: auto;
                max-width: 300px
            }
            </style>
    </head>
<body>
<ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
<form method="post"  action="/submit">
    @csrf
            <input type="text" name="username"/>
            <input type="submit"/>
        </form>
    <h1>{{ $active["name"]}}</h1>
    <img src="{{ asset($active['img']) }}">
    <ul>
        @foreach($data as $idx => $cam)

            <li><a href="{{ url("cam/$idx") }}">{{ $cam["name"] }}</a></li>
        @endforeach
    </ul>
</body>

</html>
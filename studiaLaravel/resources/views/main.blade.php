<html>
<head>
    <meta charset="utf-8">
    <title>Obsługa studentów</title>
</head>
<body bgcolor=yellow text="#000FFF">
    <input type=button value=" STUDENCI " onClick="window.location='{{ url("/studenci") }}'">
    <input type=button value=" STRONA GŁÓWNA " onClick="window.location='{{ url("/") }}'">
    <br><br>
    <form name=menu action='/ocenas'>
        <input type=submit value=" OCENY ">
    </form>
    <a href='/przedmiots'> PRZEDMIOTY </a>
    <hr>

    @yield('content')

</body>
</html>

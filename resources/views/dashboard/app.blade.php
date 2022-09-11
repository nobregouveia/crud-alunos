<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" value="{{ csrf_token() }}" />

        <title>CRUD de Alunos com Laravel e Vue.JS</title>

        <link href="css/app.css" rel="stylesheet">
    </head>

    <body>
        <div id="app"></div>
        <script src="js/app.js"></script>
    </body>

</html>

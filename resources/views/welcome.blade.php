<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script type="module" src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body>

        <div id="app">
            <main-app></main-app>
        </div>

    </body>
</html>
<script>
    import MainApp from "../js/MainApp";
    export default {
        components: {MainApp}
    }
</script>

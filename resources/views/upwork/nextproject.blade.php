 <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My project') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- public\js\function_app.js  -->
      <script src="{{ asset('js/jquery.min.js') }}"></script>
       <script src="{{ asset('js/ckeditor.js') }}"></script>
     <style>
     #numbering-system {
  display: flex;
  align-items: center;
  justify-content: center;
}

#number-input {
  width: 100px;
  text-align: center;
  font-size: 24px;
}

button {
  font-size: 24px;
}
</style>
</head>
<body>
    <div id="app">
      <div id="numbering-system">
      <input type="number" id="number-input"  value="{{$nextproject->id}}">

      <button id="up-arrow">▲</button>
      <button id="down-arrow">▼</button>
    </div>
    </div>
</body>
</html>

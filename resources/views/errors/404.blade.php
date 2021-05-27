<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>404 - Page not found</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

            <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body  style="background-image: url(/img/undertale.jpg)" class="flex flex-col justify-center items-center h-screen">
    <div class="mt-5 h-32 w-72 rounded-xl bg-red-400 text-red-700 flex flex-col items-center justify-center">
            <p class="display-3 font-extrabold text-3xl">404</p>
            <p class="display-5">Sorry, we couldnt find that page :(</p>
    </div>

     <div class="mt-5 h-24 w-60 rounded-3xl bg-purple-400 hover:bg-purple-600 text-white cursor-pointer flex flex-col items-center justify-center" onclick=" window.location.href = '/dashboard'">
          <span class="w-full text-center font-extrabold text-3xl">DASHBOARD</span>
    </div>

</body>

</html>
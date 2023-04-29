<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>inicio</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <x-jet-welcome />
        <div class="container">
            <h1>TIPO DE LETRA</h1>
            <p class="font-mont font-hairline">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum odio totam illum eius velit. Similique corrupti excepturi consequatur perferendis expedita adipisci voluptas nihil amet, architecto at saepe, enim fugiat reiciendis.</p>
            <hr/>
            <p class="font-mont font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum odio totam illum eius velit. Similique corrupti excepturi consequatur perferendis expedita adipisci voluptas nihil amet, architecto at saepe, enim fugiat reiciendis.</p>
            <hr/>
            <p class="font-mont font-semibold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum odio totam illum eius velit. Similique corrupti excepturi consequatur perferendis expedita adipisci voluptas nihil amet, architecto at saepe, enim fugiat reiciendis.</p>
            <hr/>
            <p class="font-mont font-black">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum odio totam illum eius velit. Similique corrupti excepturi consequatur perferendis expedita adipisci voluptas nihil amet, architecto at saepe, enim fugiat reiciendis.</p>
        </div>
    </body>
</html>
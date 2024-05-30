<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>マイページ</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[url('{{ asset('images/used_site/bg.png') }}')]">
    <header class='bg-amber-400'>
        <a href="/index"><img src="{{ asset('images/used_site/title.png') }}" class="w-[300px]"></a>
    </header>
    <main>
        {{$slot}}
    </main>

</body>
</html>

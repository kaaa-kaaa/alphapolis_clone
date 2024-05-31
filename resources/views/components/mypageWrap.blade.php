<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>アルファポリスっぽい何か</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[url('{{ asset('images/used_site/bg.png') }}')]">
    <header class='bg-amber-400'>
        <nav class="flex justify-between items-center gap-4">
            <div class="w-[300px]"><a href="/index"><img src="{{ asset('images/used_site/title.png') }}"></a></div>
            <div class="mr-5">
                <a href="/mypage" class="underline text-sm mr-5">マイページトップ</a>
                <a href="/search" class="underline text-sm mr-5">小説検索</a>
                @auth
                    <a href="/logout" class="underline text-sm">ログアウト</a>
                @endauth
                @guest
                    <a href="/login" class="underline text-sm mr-5">ログイン</a>
                    <a href="/register" class="underline text-sm">会員登録</a>
                @endguest
            </div>
        </nav>
    </header>
    <main>
        {{$slot}}
    </main>

</body>
</html>

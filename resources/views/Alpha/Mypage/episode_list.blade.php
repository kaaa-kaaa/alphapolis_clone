<x-mypageWrap>
    <div class="flex justify-between items-center gap-4">
            <h3 class='block dark:text-gray-300 mb-[20px] mt-[15px] ml-5'>{{$member->name}}のページ</h3>
            <h3><a href="/mypage/{{$member->id}}/editSeries/{{$series->id}}" class="text-blue-500 text-lg underline mr-5">小説の基本情報を変更する</a></h3>
    </div>
    <div class='text-center mx-auto'>
        <h1 class='block text-xl text-amber-600 dark:text-gray-300 mb-[20px] underline mt-[15px]'>{{$series->title}}の作成済エピソード一覧</h1>
        <div class="mt-[50px] mb-[50px]">
            <a href="/mypage/{{$member->id}}/{{$series->id}}/createEpisode" class="relative inline-flex items-center justify-start px-6 py-3 overflow-hidden font-medium transition-all bg-amber-400 rounded hover:bg-amber-400 group">
                <span class="w-48 h-48 rounded rotate-[-40deg] bg-amber-500 absolute bottom-0 left-0 -translate-x-full ease-out duration-500 transition-all translate-y-full mb-9 ml-9 group-hover:ml-0 group-hover:mb-32 group-hover:translate-x-0"></span>
                <span class="relative w-full text-left text-black transition-colors duration-500 ease-in-out group-hover:text-white">📚新しいエピソードを作成する</span>
            </a>
        </div>
    </div>

    <div class='mx-auto w-[70%] relative overflow-x-auto shadow-md sm:rounded-lg'>
        @if ($series->episodes->count() > 0)
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <tbody>
                    @foreach ($series->episodes as $episode)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th class="px-6 text-large font-medium text-black whitespace-nowrap dark:text-white"><a href="/read/{{$series->id}}/{{ $episode->id }}" class="inline-flex items-center text-sm font-light text-blue-600 dark:text-blue-500 underline">{{ $episode->subtitle }}</a></th>
                    </tr>
                    <tr>
                        <td class="px-6">作成日時：{{ $episode->created_at }}</td>
                        <td class="px-6">更新日時：{{ $episode->updated_at }}</td>
                        <td class="px-6"><a href="/mypage/{{$member->id}}/editEpisode/{{ $episode->id }}" class="inline-flex items-center text-sm font-light text-blue-600 dark:text-blue-500 underline">編集</a></td>
                    </tr>
                    <tr>
                        <td>　</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>投稿エピソードがありません</p>
        @endif
    </div>
    {{-- @if ($series->episodes->count() > 0)
    <table border="1">
        <tr>
            <th>サブタイトル</th>
            <th>作成日時</th>
            <th>更新日時</th>
            <th>編集</th>
        </tr>
        {{-- @foreach ディレクティブで、1件ずつ処理
        @foreach ($series->episodes as $episode)
            <tr>
                <td><a href="/read/{{$series->id}}/{{ $episode->id }}">{{ $episode->subtitle }}</a></td>
                <td>{{ $episode->created_at }}</td>
                <td>{{ $episode->updated_at }}</td>
                <td><a href="/mypage/{{$member->id}}/editEpisode/{{ $episode->id }}">編集</a></td>
            </tr>
        @endforeach
    </table>

    @else
        <p>無</p>
    @endif --}}

</x-mypageWrap>



<x-mypageWrap>
    <div class='text-center mx-auto'>
        <h1 class="mb-[20px] text-2xl text-amber-600 mt-5">📙{{ $series->title }}のエピソード一覧</h1>
        @if ($episodes->count() > 0)
            @if($cover_path != null)
                <img src="{{ asset(session('img_path')) }}" class="w-[200px]" alt="{{ $series->title }}の表紙画像">
            @endif

            <form action="{{route('bookMark')}}" method="post">
                @csrf
                <input type="hidden" name="series_id" value="{{$series->id}}">
                <input type="submit" value="ブックマークする" class="focus:outline-none text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
            </form>
            <form action="{{route('removeBookMark')}}" method="post">
                @csrf
                <input type="hidden" name="series_id" value="{{$series->id}}">
                <input type="submit" value="ブックマークを外す" class="text-blue-600 underline">
            </form>
            <div>
            <h2 class="mt-2 text-gray-600 text-sm">著：</h2>
                {{ $episode->series->member->name }}

            <h2 class="mt-2 text-gray-600 text-sm">あらすじ・紹介：</h2>
            <p>{{ $episode->series->abstract }}</p>

            <h2 class="mt-2 text-gray-600 text-sm">ジャンル：</h2>
            <p>
            @foreach ($episode->series->genres as $genre)
                {{ $genre->name }}　
            @endforeach
            </p>
            </div>

            <div class='mx-auto w-[50%] relative overflow-x-auto shadow-md sm:rounded-lg mt-10'>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <tbody>
                        @foreach ($episodes as $episode)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th class="px-6 text-lg font-medium text-blue-500 whitespace-nowrap dark:text-white underline"><a href="/read/{{ $episode->series_id }}/{{ $episode->id }}">{{ $episode->subtitle }}</a></th>
                            </tr>
                            <tr>
                                <td class="px-6">
                                    文字数：{{ Str::length($episode->episode_text) }}
                                </td>
                            </tr>
                            <tr>
                                <td>　</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h2 class="text-lg mr-5 test-gray-500">---- エピソードがありません ----</h2>
        @endif
    </div>
</x-mypageWrap>

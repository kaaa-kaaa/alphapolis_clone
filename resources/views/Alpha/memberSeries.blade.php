<x-mypageWrap>
    <div class='text-center mx-auto'>
        <h1 class="mb-[20px] text-2xl text-amber-600 mt-5">{{ $member->name }}<span class="text-gray-700">さんの投稿シリーズ一覧</span></h1>
    </div>

    <div class='mx-auto w-[55%] relative overflow-x-auto shadow-md sm:rounded-lg'>
        @if ($series->count() > 0)
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <tbody>
                    @foreach ($series as $novel)
                        @if ($novel->episodes->count() > 0)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th class="px-6 text-large font-medium text-black whitespace-nowrap dark:text-white"><a href="/read/{{ $novel->id }}" class="inline-flex items-center text-sm font-light text-blue-600 dark:text-blue-500 underline">{{$novel->title}}</a></th>
                            </tr>
                            <tr>
                                <td class="px-6">ジャンル：</td>
                                <td class="px-6">
                                    @foreach ($novel->genres as $genre)
                                        {{ $genre->name }},
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>　</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @else
            <h2 class="text-lg mr-5 test-gray-500">---- 投稿小説がありません ----</h2>
        @endif
    </div>

{{-- @if ($series->count() > 0)
    <table border="1">
        <tr>
            <th>シリーズ名</th>
            <th>ジャンル</th>
        </tr>
        {{-- @foreach ディレクティブで、1件ずつ処理
        @foreach ($series as $novel)
        @if ($novel->episodes->count() > 0)
            <tr>
                <td><a href="/read/{{ $novel->id }}">{{ $novel->title }}</a></td>
                <td>
                    @foreach ($novel->genres as $genre)
                        {{ $genre->name }}<br>
                    @endforeach
                </td>
            </tr>
        @endif
        @endforeach
    </table>
@else
    <p>小説がありません</p>
@endif --}}
</x-mypageWrap>

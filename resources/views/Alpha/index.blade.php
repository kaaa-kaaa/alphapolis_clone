<x-mypageWrap>
    <div class='text-center mx-auto'>
        <div class='mx-auto w-[55%] relative overflow-x-auto shadow-md sm:rounded-lg'>
            <img src="{{ asset('images/used_site/title.png') }}">
            @if ($series->count() > 0)
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead>
                        <th class="mb-[20px] text-lg text-amber-600">　📙投稿作品</th>
                    </thead>
                    <td>　</td>
                    <tbody>
                        @foreach ($series as $novel)
                            @if ($novel->episodes->count() > 0)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th class="px-6 text-large font-medium text-black whitespace-nowrap dark:text-white"><a href="/read/{{ $novel->id }}" class="inline-flex items-center text-sm font-light text-blue-600 dark:text-blue-500 underline">{{$novel->title}}</a></th>
                                </tr>
                                <tr>
                                    <td class="px-6"><a href="/index/{{ $novel->member_id }}" class="underline">{{ $novel->member->name }}</a></td>
                                    <td class="px-6">
                                        ジャンル：
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
    </div>
</x-mypageWrap>

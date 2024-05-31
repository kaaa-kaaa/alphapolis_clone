<x-mypageWrap>
    <div class='text-center mx-auto'>
        <h1 class="mb-[20px] text-2xl text-amber-600 mt-5">📙小説を探す</h1>

        <div>
            <form class="max-w-md mx-auto" action="/search" method="post">
                @csrf
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">検索</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" name="keyword" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="シリーズタイトル または 著者名を入力" required />
                    <input type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="小説を検索">
                </div>
            </form>
        </div>

        <div class="mt-5">
            <a href="/search"><button type="button" class="focus:outline-none text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">検索をリセット</button></a>
        </div>

        <div class='mx-auto w-[55%] relative overflow-x-auto shadow-md sm:rounded-lg'>
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

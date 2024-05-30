<x-mypageWrap>
    <div class='text-center mx-auto'>
        <h1 class='block text-xl text-amber-600 dark:text-gray-300 mb-[20px] underline mt-[15px]'>マイページ</h1>

        <div>
            <p>ようこそ{{$member->name}}さん</p>
            <p>
                <a href="/mypage/{{$member->id}}/edit" class="inline-flex items-center text-sm font-light text-blue-600 dark:text-blue-500 hover:underline">
                    プロフィール編集
                    <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </p>
        </div>

        <div class="mt-[50px] mb-[50px]">
            <a href="/mypage/{{$member->id}}/createSeries" class="relative inline-flex items-center justify-start px-6 py-3 overflow-hidden font-medium transition-all bg-amber-400 rounded hover:bg-white group">
                <span class="w-48 h-48 rounded rotate-[-40deg] bg-amber-500 absolute bottom-0 left-0 -translate-x-full ease-out duration-500 transition-all translate-y-full mb-9 ml-9 group-hover:ml-0 group-hover:mb-32 group-hover:translate-x-0"></span>
                <span class="relative w-full text-left text-black transition-colors duration-300 ease-in-out group-hover:text-white">📚新しい小説を投稿する</span>
            </a>
        </div>
    </div>

    <div class='mx-auto w-[70%] relative overflow-x-auto shadow-md sm:rounded-lg'>
        <h2 class="mb-[20px]">📙投稿済み小説一覧</h2>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <tbody>
                @foreach ($member->series as $novel )
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th class="px-6 text-large font-medium text-black whitespace-nowrap dark:text-white"><a href="/mypage/{{$member->id}}/{{$novel->id}}" class="inline-flex items-center text-sm font-light text-blue-600 dark:text-blue-500 underline">{{$novel->title}}</a></th>
                </tr>
                <tr>
                    <td class="px-6">評価：{{$novel->evaluation}}</td>
                    <td class="px-6">総いいね数：まだ</td>
                    <td class="px-6">更新日：{{$novel->update_at}}</td>
                </tr>
                <tr>
                    <td>　</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class='mx-auto w-[70%] mt-[50px]'>
        <h2 class="mb-[20px]">📕ブックマーク</h2>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th class="px-6 text-large font-medium text-black whitespace-nowrap dark:text-white"><a href="" class="inline-flex items-center text-sm font-light text-blue-600 dark:text-blue-500 underline">none</a></th>
                </tr>
                <tr>
                    <td>　</td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th class="px-6 text-large font-medium text-black whitespace-nowrap dark:text-white"><a href="" class="inline-flex items-center text-sm font-light text-blue-600 dark:text-blue-500 underline">null</a></th>
                </tr>
                <tr>
                    <td>　</td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th class="px-6 text-large font-medium text-black whitespace-nowrap dark:text-white"><a href="" class="inline-flex items-center text-sm font-light text-blue-600 dark:text-blue-500 underline">ない</a></th>
                </tr>
                <tr>
                    <td>　</td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th class="px-6 text-large font-medium text-black whitespace-nowrap dark:text-white"><a href="" class="inline-flex items-center text-sm font-light text-blue-600 dark:text-blue-500 underline">時間があったら</a></th>
                </tr>
                <tr>
                    <td>　</td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th class="px-6 text-large font-medium text-black whitespace-nowrap dark:text-white"><a href="" class="inline-flex items-center text-sm font-light text-blue-600 dark:text-blue-500 underline">作ります</a></th>
                </tr>
                <tr>
                    <td>　</td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th class="px-6 text-large font-medium text-black whitespace-nowrap dark:text-white"><a href="" class="inline-flex items-center text-sm font-light text-blue-600 dark:text-blue-500 underline">多分</a></th>
                </tr>
                <tr>
                    <td>　</td>
                </tr>
            </tbody>
        </table>
    </div>
</x-mypageWrap>

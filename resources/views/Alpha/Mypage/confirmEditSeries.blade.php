<x-mypageWrap>
    <div class='text-center mx-auto mb-[50px] mt-[20px]'>
        <h1 class='block text-xl text-amber-600 dark:text-gray-300 underline'>編集内容の確認</h1>
    </div>

    <div class="max-w-sm mx-auto">
        <p class="mb-[30px] text-amber-600">タイトル：<span class="text-gray-700">{{$request->title}}</span></p>
        <p class="mb-1 text-amber-600">あらすじ：</p>
        <p class="text-gray-700 mb-[30px]">{{$request->abst}}</p>
        <div class="mb-[30px]">
            <p class="mb-1 text-amber-600">ジャンル：</p>
            @foreach ($creGenres as $genre)
                <p class="text-gray-700">{{$genre}}</p>
            @endforeach
        </div>
        <p class="mb-1 text-amber-600">表紙画像：</p>
        @if($file_path == null)
            <p>変更しない</p>
        @else
            <p class="text-gray-700 mb-[30px]">{{$file_path}}</p>
            <img src="{{asset(session('img_path'))}}" alt="">
        @endif
    </div>

    <div class="max-w-sm mx-auto">
        <div>
            <form action="" method="POST">
                @csrf
                <input type="hidden" value="{{$request->member_id}}" name="member_id">
                <input type="hidden" value="{{$request->series_id}}" name="series_id">
                <input type="hidden" value="{{$request->title}}" name="title">
                <input type="hidden" value="{{$request->abst}}" name="abst">
                @foreach ($request->genres as $genre)
                    <input type="hidden" value="{{$genre}}" name="genres[]">
                @endforeach
                <input type="hidden" value="{{$file_path}}" name="cover_image_path">
                <input type="submit" name="confirm" value="確定" class="text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <input type="submit" name="backCreate" value="戻る" class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            </form>
        </div>
    </div>
</x-mypageWrap>

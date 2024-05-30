<x-mypageWrap>
    <div class='text-center mx-auto mb-[50px] mt-[20px]'>
        <h1 class='block text-xl text-amber-600 dark:text-gray-300 underline'>新しい小説を投稿する</h1>
    </div>

    <div class="max-w-sm mx-auto">
        <p class="mb-[20px]">📙小説の基本情報</p>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">タイトル</label>
                @if ($errors->has('title'))
                    <p class="error text-orange-700">*{{ $errors->first('title') }}</p>
                @endif
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-5">
                <label for="abst" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">あらすじ</label>
                @if ($errors->has('abst'))
                    <p class="error text-orange-700">*{{ $errors->first('abst') }}</p>
                @endif
                <textarea id="abst" name="abst" rows="8" class="w-full px-0 text-sm text-gray-900 bg-white border-gray-400 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="あらすじを入力..." required>{{ old('abst') }}</textarea>
            </div>
            <label for="genre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ジャンル　<span class="text-xs text-orange-600">※複数選択可</sapn></label>
            @if ($errors->has('genre'))
                <p class="error text-orange-700">*{{ $errors->first('genre') }}</p>
            @endif
            <div id="genre" class="mb-5">
                @foreach ($genres as $genre)
                <div class="flex items-start mb-1">
                    <div class="flex items-center h-5">
                        <input id="{{$genre->name}}" type="checkbox" name="genres[]" value="{{$genre->id}}" class="w-3 h-3 border border-gray-400 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"/>
                        <label for="{{$genre->name}}" class="ms-2 text-xs font-medium text-gray-500 dark:text-gray-300">{{$genre->name}}　</label>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mb-5">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">表紙画像</label>
                <input type="file" name="cover_image_path" id="image">
            </div>
            <div class="mb-10">
                <input type="hidden" value="{{$member_id}}" name="member_id">
                <input type="submit" name="create" value="作成" class="text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            </div>
        </form>
    </div>
</x-mypageWrap>

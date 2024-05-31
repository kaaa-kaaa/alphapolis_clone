<x-mypageWrap>
    <div class='text-center mx-auto mb-[50px] mt-[20px]'>
        <h1 class='block text-xl text-amber-600 dark:text-gray-300 underline'>プロフィールの編集</h1>
    </div>

    <div class="max-w-sm mx-auto">
        <form action="" method="POST">
            @csrf
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ユーザ名</label>
                @if ($errors->has('name'))
                    <p class="error text-orange-700">*{{ $errors->first('name') }}</p>
                @endif
                <input type="text" id="name" name="name" value="{{ $memberInfo->name }}" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">メールアドレス</label>
                @if ($errors->has('email'))
                    <p class="error text-orange-700">*{{ $errors->first('mail') }}</p>
                @endif
                <input type="email" id="email" name="email" value="{{ $memberInfo->email }}" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-5">
                <p class="text-blue-500 text-xs underline"><a href="/mypage/editMember/changePass">パスワードを変更しますか？</a></p>
            </div>
            <div class="mb-10">
                <input type="submit" name="edit" value="更新" class="text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            </div>
        </form>
    </div>
</x-mypageWrap>

<x-mypageWrap>
    <div class='text-center mx-auto mb-[50px] mt-[20px]'>
        <h1 class='block text-xl text-amber-600 dark:text-gray-300 underline'>パスワードの変更</h1>
    </div>

    <div class="max-w-sm mx-auto">
        <form action="" method="POST">
            @csrf
            <div class="mb-5">
                <label for="pass" class="block mb-1 mt-1 text-sm font-medium text-gray-900 dark:text-white">新しいパスワードを入力</label>
                @if ($errors->has('pass'))
                    <p class="error text-orange-700">*{{ $errors->first('pass') }}</p>
                @endif
                {{-- @if($not == true)
                    <div class="alert alert-danger">
                        <p class="text-orange-700 text-xs">※パスワードが違います</p>
                    </div>
                @endif --}}
                <input type="password" id="pass" name="pass" value="" required class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                <label for="pass_conf" class="block mb-1 mt-1 text-sm font-medium text-gray-900 dark:text-white">パスワードを確認</label>
                <input type="password" id="pass_conf" name="pass_conf" value="" required class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                @if (Session::has('message'))
                    <p class="text-xs text-orange-700">{{ session('message') }}</p>
                @endif
            </div>
            <div class="mb-10">
                <input type="submit" name="edit" value="更新" class="text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            </div>
        </form>
    </div>
</x-mypageWrap>

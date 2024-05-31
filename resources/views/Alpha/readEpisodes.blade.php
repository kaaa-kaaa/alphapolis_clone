<x-mypageWrap>
    <div class='text-center mx-auto'>
        <h1 class="mb-[20px] text-2xl text-gray-700 mt-5">📙{{ $episodes->series->title}}</h1>
        <h2 class="mt-2 text-gray-600 text-sm">著：</h2>
        <p>{{ $episodes->series->member->name}}</p>
        <h2 class="mt-2 text-xl">{{ $episodes->subtitle }}</h2>
    </div>

    <div class='mx-auto w-[70%] relative overflow-x-auto shadow-md sm:rounded-lg mt-10'>
        <p>{{ $episodes->episode_text }}</p>
    </div>
</x-mypageWrap>


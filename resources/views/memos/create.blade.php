<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            新しいメモを作成
        </h2>
    </x-slot>

    <div class="py-6 px-4 max-w-2xl mx-auto">
        <form action="{{ route('memos.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- タイトル --}}
            <div>
                <label for="title" class="block text-gray-700 font-medium">タイトル</label>
                <input type="text" name="title" id="title"
                       value="{{ old('title') }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- 内容 --}}
            <div>
                <label for="content" class="block text-gray-700 font-medium">内容</label>
                <textarea name="content" id="content" rows="6"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- 保存ボタン --}}
            <div>
                <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white font-medium px-4 py-2 rounded-lg shadow-sm">
                    保存する
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

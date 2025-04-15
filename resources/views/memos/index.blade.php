<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            メモ一覧
        </h2>
    </x-slot>

    <div class="py-6 px-4 max-w-2xl mx-auto">

        {{-- 🔍 検索フォーム --}}
        <form action="{{ route('memos.index') }}" method="GET" class="flex flex-col sm:flex-row gap-3 mb-6">
            <input
                type="text"
                name="search"
                placeholder="キーワード検索"
                value="{{ old('search', $search ?? '') }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
            />
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded-lg">
                検索
            </button>
        </form>

        {{-- ＋ 新規作成ボタン --}}
        <div class="mb-6 text-left">
            <a href="{{ route('memos.create') }}"
               class="bg-green-500 hover:bg-green-600 text-white font-medium px-4 py-2 rounded-lg shadow-sm">
                ＋ 新規作成
            </a>
        </div>

        {{-- 📋 メモ一覧 --}}
        @forelse ($memos as $memo)
            <div class="mb-4 p-4 bg-white border border-gray-200 shadow-sm rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800">{{ $memo->title }}</h3>
                <p class="text-gray-700 mt-2">{{ $memo->content }}</p>
                <div class="mt-3">
                    <a href="/memos/{{ $memo->id }}/edit"
                       class="text-blue-600 hover:text-blue-800 text-sm">
                        編集する
                    </a>
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-center">メモが見つかりませんでした。</p>
        @endforelse

        {{-- 📄 ページネーション --}}
        <div class="mt-8">
            {{ $memos->links() }}
        </div>
    </div>
</x-app-layout>

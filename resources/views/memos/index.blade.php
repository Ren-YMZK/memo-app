<x-app-layout>
    {{-- 🧢 ヘッダー --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('メモ一覧') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 max-w-4xl mx-auto">
        {{-- 🔍 検索フォーム --}}
        <form action="{{ route('memos.index') }}" method="GET" class="flex gap-2 mb-4">
            <input
                type="text"
                name="search"
                placeholder="キーワード検索"
                value="{{ old('search', $search ?? '') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300"
            />
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded">
                検索
            </button>
        </form>

        {{-- ＋ 新規作成ボタン --}}
        <div class="mb-6 text-left">
            <a href="{{ route('memos.create') }}"
               class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded shadow">
                ＋ 新規作成
            </a>
        </div>

        {{-- 📋 メモ一覧 --}}
        @forelse ($memos as $memo)
            <div class="mb-4 p-4 bg-white shadow rounded border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800">{{ $memo->title }}</h3>
                <p class="text-gray-700 mt-2">{{ $memo->content }}</p>
                <div class="mt-3">
                    <a href="/memos/{{ $memo->id }}/edit"
                       class="text-blue-600 hover:underline text-sm">
                        編集する
                    </a>
                </div>
            </div>
        @empty
            <p class="text-gray-500">メモが見つかりませんでした。</p>
        @endforelse

        {{-- 📄 ページネーション --}}
        <div class="mt-6">
            {{ $memos->links() }}
        </div>
    </div>
</x-app-layout>

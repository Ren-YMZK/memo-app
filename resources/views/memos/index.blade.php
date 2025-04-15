{{-- layouts/app.blade.php を継承 --}}
<x-app-layout>
    {{-- 🔻 これがヘッダーになる部分 --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('メモ一覧') }}
        </h2>
    </x-slot>

    {{-- 🔍 検索フォーム --}}
    <div class="py-4 px-6">
        <form action="{{ route('memos.index') }}" method="GET" class="mb-4">
            <input type="text" name="search" placeholder="キーワード検索"
                value="{{ old('search', $search ?? '') }}"
                class="border px-2 py-1 rounded" />
            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">検索</button>
        </form>

        {{-- メモ一覧 --}}
        @forelse ($memos as $memo)
            <div class="mb-4 p-4 bg-white shadow rounded">
                <h3 class="text-lg font-bold">{{ $memo->title }}</h3>
                <p>{{ $memo->content }}</p>
                <a href="/memos/{{ $memo->id }}/edit" class="text-blue-500 text-sm">編集</a>
            </div>
        @empty
            <p>メモが見つかりませんでした。</p>
        @endforelse
    </div>
</x-app-layout>

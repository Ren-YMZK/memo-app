<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            メモ一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('memos.create') }}" class="text-blue-500 underline">＋ 新しいメモ</a>

                <ul class="mt-4">
                    @foreach($memos as $memo)
                        <li class="mb-4 border-b pb-2">
                            <strong>{{ $memo->title }}</strong><br>
                            {{ $memo->content }}<br>

                            <a href="{{ route('memos.edit', $memo->id) }}" class="text-green-600">編集</a>

                            <form action="{{ route('memos.destroy', $memo->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('本当に削除しますか？')" class="text-red-600">削除</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>

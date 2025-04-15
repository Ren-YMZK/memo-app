<h1>メモを編集する</h1>

<form action="/memos/{{ $memo->id }}" method="POST">
    @csrf
    @method('PUT')

    {{-- タイトル --}}
    <label>タイトル:</label><br>
    <input type="text" name="title" value="{{ old('title', $memo->title) }}"><br>
    @error('title')
        <div style="color: red;">{{ $message }}</div>
    @enderror
    <br>

    {{-- 内容 --}}
    <label>内容:</label><br>
    <textarea name="content" rows="5" cols="30">{{ old('content', $memo->content) }}</textarea><br>
    @error('content')
        <div style="color: red;">{{ $message }}</div>
    @enderror
    <br>

    <button type="submit">更新する</button>
</form>

<p><a href="/">← 一覧に戻る</a></p>

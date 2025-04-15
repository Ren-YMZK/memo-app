<h1>新しいメモを作る</h1>

<form action="/memos" method="POST">
    @csrf

    {{-- タイトル --}}
    <label>タイトル:</label><br>
    <input type="text" name="title" value="{{ old('title') }}"><br>
    @error('title')
        <div style="color: red;">{{ $message }}</div>
    @enderror
    <br>

    {{-- 内容 --}}
    <label>内容:</label><br>
    <textarea name="content" rows="5" cols="30">{{ old('content') }}</textarea><br>
    @error('content')
        <div style="color: red;">{{ $message }}</div>
    @enderror
    <br>

    <button type="submit">保存</button>
</form>

<p><a href="/">← 一覧へ戻る</a></p>

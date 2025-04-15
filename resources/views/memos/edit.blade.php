<h1>メモを編集</h1>

<form action="/memos/{{ $memo->id }}" method="POST">
    @csrf
    @method('PUT')

    <label>タイトル:</label><br>
    <input type="text" name="title" value="{{ $memo->title }}"><br><br>

    <label>内容:</label><br>
    <textarea name="content" rows="5" cols="30">{{ $memo->content }}</textarea><br><br>

    <button type="submit">更新</button>
</form>

<p><a href="/">← 一覧へ戻る</a></p>

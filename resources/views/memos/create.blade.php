<h1>新しいメモを作る</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/memos" method="POST">
    @csrf
    <label>タイトル:</label><br>
    <input type="text" name="title"><br><br>

    <label>内容:</label><br>
    <textarea name="content" rows="5" cols="30"></textarea><br><br>

    <button type="submit">保存</button>
</form>

<p><a href="/">← 一覧へ戻る</a></p>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>タスク一覧</h1>
    <ul>
        @foreach ( $tasks as $task)
            <li>
                <a href="/tasks/{{ $task->id }}">{{ $task->title }}</a>
                <form action="/tasks/{{ $task->id }}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="削除する" onclick="if(!confirm('削除しますか？')){return false};">
                </form>
            </li>
        @endforeach
    </ul>
    <hr>
    @if (count($errors) > 0)
    <div>
        <p>
            <b>【エラー内容】</b>
        </p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h1>新規論文投稿</h1>
    <form action="/tasks" method="post">
        @csrf
        <p>
            タイトル<br>
            <input type="string" name="title" value="{{ old('title')}}">
        </p>
        <p>
            本文<br>
            <textarea type="text" name="body" value="{{ old('body') }}"></textarea>
        </p>
        <input type="submit" value="Create Task">
    </form>
    
</body>
</html>
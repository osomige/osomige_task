<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>タスク詳細</h1>
        <p>【タイトル】<br>{{ $task->title}}</p> 
        <p>【内容】<br>{{ $task->body}}</p>
        
    <a href="/tasks"> <input type="submit" value="一覧に戻る"></a>
    <a href="/tasks/{{ $task->id}}/edit"> <input type="submit" value="編集する"></a>
    <form action="/tasks/{{ $task->id }}" method="post" style="display: inline">
        @csrf
        @method('DELETE')
        <input type="submit" value="削除する" onclick="if(!confirm('削除しますか？')){return false};">
    </form>
    

</body>
</html>
通常ユーザ用ページだよ
<form action="/normal-user/tasks/store" method="post">
    @csrf
    <input type="text" name="task_title">
    <textarea name="task_description" id="task_description" cols="30" rows="10"></textarea>
    <button type="submit">追加</button>
</form>
@foreach ($tasks as $task)
    <div>
        <p>{{ $task['title'] }}</p>
        <p>{{ $task['description'] }}</p>
    </div>
@endforeach

<x-app-layout>
    通常ユーザ用ページだよ
    <form action="/normal-user/tasks/store" method="post">
        @csrf
        <input type="text" name="task_title">
        <textarea name="task_description" id="task_description" cols="30" rows="10"></textarea>
        <button type="submit">追加</button>
    </form>
    @foreach ($tasks as $task)
        <div class="m-4">
            <div class="flex flex-row itmes-center">
                <input class="m-1" type="checkbox">
                <div>{{ $task['title'] }}</div>
            </div>
            <div class="flex">
                <p class="mr-2">詳細</p>
                <p>{{ $task['description'] }}</p>
            </div>
        </div>
    @endforeach
</x-app-layout>

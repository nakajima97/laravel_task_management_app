<x-app-layout>
    <div class="w-full flex justify-center">
        <div class="w-9/12">
            通常ユーザ用ページだよ
            <form action="/normal-user/tasks/store" method="post">
                @csrf
                <div class="flex w-full">
                    <div class="grow">
                        <div class="mb-1 w-full">
                            <input type="text" name="task_title" class="w-full" placeholder="タスクのタイトルを入力してください">
                        </div>
                        <textarea name="task_description" id="task_description" rows="2" class="w-full" placeholder="タスクの詳細を入力してください"></textarea>
                    </div>
                    <div class="m-2">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-300 text-white rounded px-4 py-2">追加</button>
                    </div>
                </div>
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
                    <div class="flex">
                        <form action="/normal-user/tasks/destroy/{{ $task['id'] }}" method="post">
                            @csrf
                            <button
                                class="text-white
                            bg-red-500 border-0 py-2 px-4 focus:outline-none
                            hover:bg-red-600 rounded">削除</button>
                        </form>
                        <form action="/normal-user/tasks/finish/{{ $task['id'] }}" method="POST">
                            @csrf
                            <button
                                class="text-white
                            bg-green-500 border-0 py-2 px-4 focus:outline-none
                            hover:bg-green-600 rounded">完了</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

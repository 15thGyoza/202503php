<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .todo-container {
            max-width: 600px;
            margin: 0 auto;
        }
        .todo-header {
            font-size: 2rem;
            margin-bottom: 20px;
        }
        .todo-list {
            list-style: none;
            padding: 0;
        }
        .todo-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .todo-item input[type="checkbox"] {
            margin-right: 10px;
        }
        .todo-item button {
            margin-left: auto;
            background: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .todo-item button:hover {
            background: darkred;
        }
        .add-todo input {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="todo-container">
    <div class="todo-header">Todo List</div>

    <div class="add-todo">
        <input type="text" id="todo-title" placeholder="Enter a new task" />
        <button id="add-todo">Add Todo</button>
    </div>

    <ul class="todo-list">
        @foreach ($todos as $todo)
            <li class="todo-item" id="todo-{{ $todo->id }}">
                <input type="checkbox" class="todo-checkbox" data-id="{{ $todo->id }}" {{ $todo->completed ? 'checked' : '' }}>
                <span>{{ $todo->title }}</span>
                <button class="delete-todo" data-id="{{ $todo->id }}">Delete</button>
            </li>
        @endforeach
    </ul>
</div>

<script>
    // 添加新的 Todo
    document.getElementById('add-todo').addEventListener('click', function() {
        const title = document.getElementById('todo-title').value;
        if (title) {
            fetch('/todos', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ title: title }),
            })
                .then(response => response.json())
                .then(data => {
                    const todoList = document.querySelector('.todo-list');
                    const newTodo = document.createElement('li');
                    newTodo.classList.add('todo-item');
                    newTodo.innerHTML = `
                        <input type="checkbox" class="todo-checkbox" data-id="${data.id}">
                        <span>${data.title}</span>
                        <button class="delete-todo" data-id="${data.id}">Delete</button>
                    `;
                    todoList.appendChild(newTodo);
                    document.getElementById('todo-title').value = ''; // 清空输入框
                });
        }
    });

    // 删除 Todo
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('delete-todo')) {
            const todoId = event.target.getAttribute('data-id');
            fetch(`/todos/${todoId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            })
                .then(response => {
                    if (response.ok) {
                        document.getElementById(`todo-${todoId}`).remove();
                    }
                });
        }
    });
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Proyek - {{ $project->name }}</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 10px;
            padding: 10px;
        }

        .card.done {
            background-color: #f2f2f2;
        }

        .card.done span {
            text-decoration: line-through;
        }
    </style>
</head>
<body>
    <h1>Detail Proyek - {{ $project->name }}</h1>
    
    <a href="{{ route('projects.index') }}"><button>Kembali</button></a>
    
    <!-- Form untuk menambahkan tugas -->
    <form action="{{ route('tasks.store', $project) }}" method="post">
        @csrf
        <label for="task">Tambah Tugas:</label>
        <input type="text" id="task" name="name" required>
        <button type="submit">Tambah Tugas</button>
    </form>

    <h2>Daftar Tugas:</h2>
    <ul>
        @foreach($project->tasks as $task)
            <li class="card {{ $task->status ? 'done' : '' }}">
                <span>{{ $task->name }}</span>
                <form action="{{ route('tasks.update', $task) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <button type="submit">{{ $task->status ? 'Batal Selesai' : 'Selesai' }}</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Proyek</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 10px;
        }

        .card .title {
            text-align: center;
            font-size: 24px;
            padding: 10px;
        }

        .card .buttons {
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }

        .card .buttons button {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            transition: 0.3s;
        }

        .card .buttons button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Daftar Proyek</h1>
    <a href="{{ route('projects.create') }}"><button class="buttons">Tambah Proyek</button></a>
    <a href="{{ url('/') }}"><button class="buttons">Kembali</button></a>
    <div>
        @foreach($projects as $project)
            <div class="card">
                <div class="title">{{ $project->name }}</div>
                <div class="buttons">
                    <a href="{{ route('projects.show', $project) }}"><button>Detail</button></a>
                    <a href="{{ route('projects.edit', $project) }}"><button>Edit</button></a>
                    <form action="{{ route('projects.destroy', $project) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>


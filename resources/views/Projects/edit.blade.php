<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Proyek</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        h1 {
            text-align: center;
        }
        
        a {
            text-decoration: none;
        }
        
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        
        button:hover {
            opacity: 0.8;
        }
        
        .btn-kembali {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Proyek: {{ $project->name }}</h1>
        <a href="{{ route('projects.index') }}"><button class="btn-kembali">Kembali</button></a>
        <form action="{{ route('projects.update', $project) }}" method="post">
            @csrf
            @method('PATCH')
            <label for="name">Nama:</label>
            <input type="text" name="name" id="name" value="{{ $project->name }}"><br><br>
            <button type="submit">Update Proyek</button>
        </form>
    </div>
</body>
</html>


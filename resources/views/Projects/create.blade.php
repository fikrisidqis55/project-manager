<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Proyek Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        form {
            border: 3px solid #f1f1f1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            width: 50%;
            margin: 20px auto;
            border-radius: 10px;
        }
        
        label {
            padding: 10px;
        }
        
        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-tambah {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .btn-tambah:hover {
            opacity: 0.8;
        }

        .btn-kembali {
            background-color: #f44336;
            color: white;
            padding: 14px 20px;
            border: none;
            cursor: pointer;
            /* width: 100%; */
        }

        .btn-kembali:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <h1>Tambah Proyek Baru</h1>
    <a href="{{ route('projects.index') }}"><button class="btn-kembali">Kembali</button></a>

    <form action="{{ route('projects.store') }}" method="post">
        @csrf
        <label for="name">Nama Proyek:</label><br>
        <input type="text" id="name" name="name"><br>
        <button type="submit" class="btn-tambah">Tambah Proyek</button>
    </form>
</body>
</html>


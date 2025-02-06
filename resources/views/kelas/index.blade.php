<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>J</title>
</head>
<body>
    <h1>Data</h1>
    <ul>
        @foreach ($data as $s)
            <br>Nama siswa: {{ $s->nama_siswa }} - Email: {{ $s->email }} - Gender {{ $s->gender }} - Umur {{ $s->umur }} - Kelas {{ $s->kelas->nama_kelas }}</br>
            @foreach ($mapels as $item)
                Mapel:   {{ $item->nama_mapel }}
            @endforeach
        @endforeach
    </ul>

</body>
</html>`

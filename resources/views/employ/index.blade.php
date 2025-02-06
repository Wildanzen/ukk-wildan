{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pegawai</title>
</head>
<body>
    <h1></h1>
    <h2></h2>

    @foreach ($groupedEmploys as $company => $employees)
    <h3>{{ $company }}</h3>
    <ul>
        @foreach ($employees as $e)
        <li>{{ $e->employ_name }}</li>
    </ul>
</body>
</html>

 {{-- @foreach ($groupedEmploys as $company => $employees) --}}
    {{-- <h3>{{ $company }}</h3>
    <ul>
        @foreach ($employees as $e)
            <li>{{ $e->employ_name }}</li>
        @endforeach
    </ul>
@endforeach --}} --}}

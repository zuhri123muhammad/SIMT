<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="2px">
        <thead>
            <tr>
                <th>Nama Preastasi</th>
                <th>Nama Mahasiswa</th>
                <th>Tanggal</th>
                <th>Tingkat</th>
                <th>Tipe</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->mahasiswa->fullName}}</td>
                    <td>{{$item->date}}</td>
                    <td>{{$item->level}}</td>
                    <td>{{$item->type}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    {{-- pour ajouter du style --}}
    <link rel="stylesheet" href="{{ public_path('css/style.css') }}" />
</head>
<body>
    <table  border="1" style="border-collapse: collapse; width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Blog</th>
                <th>Auteur</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->content}}</td>
                    <td>{{$item->user->fullname}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
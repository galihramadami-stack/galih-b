<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <legend>Data Post</legend>
        <table border="1">
            <tr>
                <td>No</td>
                <td>Title</td>
                <td>Content</td>
            </tr>
            @foreach ($post as $data )
            <tr>
                <th>{{$loop->iteration}}</th>
                <th>{{$data->title}}</th>
                <th>{{Str::limit($data->content, 100)}}</th>
            </tr>
            @endforeach
        </table>
    </fieldset>
</body>
</html>
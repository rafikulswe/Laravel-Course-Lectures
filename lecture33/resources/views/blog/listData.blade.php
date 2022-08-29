<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>This is Blog list</h2>
    <span>author:  {{ $author }}</span><br>
    <span>abc:  {{ $abc }}</span>
    <hr>
    @foreach ($blog as $item)
        <span>{{ $item['id']  }} - {{ $item['title'] }}</span> <br>
    @endforeach


</body>
</html>

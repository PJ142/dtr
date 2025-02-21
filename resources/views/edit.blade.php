<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Time</h1>
    <form action="/edit/{{$dtr->id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="date" name="date" value="{{$dtr->date}}">
        <input type="time" name="time" value="{{$dtr->time_in_am}}">
        <input type="time" name="time" value="{{$dtr->time_out_am}}">
        <input type="time" name="time" value="{{$dtr->time_in_pm}}">
        <input type="time" name="time" value="{{$dtr->time_out_pm}}">
    </form>
</body>
</html>
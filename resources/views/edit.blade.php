<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit DTR Time</title>
    <style>
        table {
            width: 50%;
            margin: auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            margin-top: 15px;
            padding: 10px 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Edit Time</h1>
    <form action="/edit/{{$edit->id}}" method="POST">
        @csrf
        @method('PUT')
    
        <table>
            <tr>
                <td><label for="date">Date:</label></td>
                <td><input type="date" name="date" value="{{$edit->date}}" required></td>
            </tr>
            <tr>
                <td><label for="time_in_am">Time In (AM):</label></td>
                <td><input type="time" name="time_in_am" value="{{$edit->time_in_am}}" required></td>
            </tr>
            <tr>
                <td><label for="time_out_am">Time Out (AM):</label></td>
                <td><input type="time" name="time_out_am" value="{{$edit->time_out_am}}" required></td>
            </tr>
            <tr>
                <td><label for="time_in_pm">Time In (PM):</label></td>
                <td><input type="time" name="time_in_pm" value="{{$edit->time_in_pm}}" required></td>
            </tr>
            <tr>
                <td><label for="time_out_pm">Time Out (PM):</label></td>
                <td><input type="time" name="time_out_pm" value="{{$edit->time_out_pm}}" required></td>
            </tr>
        </table>
    
        <button type="submit">Save Changes</button>
    </form>
    
</body>
</html>

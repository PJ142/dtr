<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth
     <form action="/logout" method="POST">
        @csrf
        <button>Logout</button>
    </form>

    <div style="border: 3px solid black">
        <h2>Enter your Daily Time Record</h2>
        <form action="/create-dtr" method="POST">
            @csrf
            <input type="date" name="date">
            <input type="time" name="time_in_am">
            <input type="time" name="time_out_am">
            <input type="time" name="time_in_pm">
            <input type="time" name="time_out_pm">
            <button>Submit</button>
        </form>    
    </div>

    
<div>

    <<div style="border: 3px solid black; padding: 10px; margin: 10px;">
        <h2>Daily Time Records of {{ auth()->user()->name }}</h2>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="border: 1px solid black; padding: 8px;">Date</th>
                    <th style="border: 1px solid black; padding: 8px;">Time In AM</th>
                    <th style="border: 1px solid black; padding: 8px;">Time Out AM</th>
                    <th style="border: 1px solid black; padding: 8px;">Time In PM</th>
                    <th style="border: 1px solid black; padding: 8px;">Time Out PM</th>
                    <th style="border: 1px solid black; padding: 8px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dtrs as $dtr)
                    <tr>
                        <td style="border: 1px solid black; padding: 8px;">{{ $dtr['date'] }}</td>
                        <td style="border: 1px solid black; padding: 8px;">{{ $dtr['time_in_am'] }}</td>
                        <td style="border: 1px solid black; padding: 8px;">{{ $dtr['time_out_am'] }}</td>
                        <td style="border: 1px solid black; padding: 8px;">{{ $dtr['time_in_pm'] }}</td>
                        <td style="border: 1px solid black; padding: 8px;">{{ $dtr['time_out_pm'] }}</td>
                        <td style="border: 1px solid black; padding: 8px;">
                            <!-- Edit Link -->
                            <a href="/edit/{{ $dtr->id }}" style="margin-right: 10px;">Edit</a>
    
                            <!-- Delete Form -->
                            <form action="/delete/{{ $dtr->id }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: red; color: white; border: none; padding: 5px 10px; cursor: pointer;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    


{{-- <table border="1"   >
    <h2>Your DTR Records</h2>
    <tr>
        <th>Date</th>
        <th>Time In AM</th>
        <th>Time Out AM</th>
        <th>Time In PM</th>
        <th>Time Out PM</th>
    </tr>
    @foreach ($dtrs as $dtr)
        <td>{{$dtr['date'] }}</td>
        <td>{{$dtr[time_in_am]}}</td>
        <td>{{$dtr[time_out_am]}}</td>
        <td>{{$dtr[time_in_pm]}}</td>
        <td>{{ $dtr[time_out_pm]}}</td>
    @endforeach
</table> --}}


        @else
        <div style="border: 3px solid black">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input name='name' type="text" placeholder="Name">
                <input name='email' type="text" placeholder="Email">
                <input name='password' type="password" placeholder="Password">
                <button>Register</button>
            </form>
        </div>

        <div style="border: 3px solid black">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input name='login_name' type="text" placeholder="Name">
                <input name='login_password' type="password" placeholder="Password">
                <button>Login</button>
            </form>
        </div>
    @endauth
    
</body>
</html>
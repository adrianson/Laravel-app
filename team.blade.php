<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Team</title>
</head>

<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
        </tr>

        @foreach ($team as $member)
            <tr>
                <td>{{ $member['name'] }}</td>
                <td>{{ $member['role'] }}</td>
                <td>{{ $member['email'] }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>

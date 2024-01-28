<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <div class="text-center mt-10">
    <H1>EventRegSys</H1>
    <p>DBMS</p>
        <form action="{{route('events.create')}}">
            @csrf
            <button type="submit">Create Event</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Event details</th>
                    <th>Timestamp</th>
                    <th>Action</th>
                </tr>
            </thead>
            @forelse ($events as $m)
                <tbody>
                    <tr>
                        <th>
                            <h1>{{$m->eventName}}</h1>
                            <p>{{$m->location}}</p>
                            <p>{{$m->date}}</p>
                        </th>
                        <th>
                            <p>{{$m->created_at}}</p>
                            <p>{{$m->updated_at}}</p>
                        </th>
                        <th>
                            <form action="{{route('events.destroy',[$m->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('events.show',[$m->id])}}">View</a>
                                <a href="{{route('events.edit',[$m->id])}}">Edit</a>
                                <button submit>Delete</button>
                            </form>
                        </th>
                    </tr>
                </tbody>
            @empty
                <td colspan="3">NO DATA</td>
            @endforelse
            
        </table>
    </div>
</body>
</html>
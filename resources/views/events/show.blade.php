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
    <H1>{{$event->eventName}}</H1>
    <p>{{$event->location}}</p>
    <p>{{$event->date}}</p>
        <form action="{{route('events.index')}}">
            @csrf
            <button type="submit">Back</button>
        </form>
        <form action="{{route('guests.store')}}" method="POST" class="pt-10">
            @csrf
            <label for="eventName">Guest Name:</label>
            <input type="text" name="name" placeholder="Guest Name" required autocomplete="off">
            <input type="integer" id="eventID" name="eventID" value="{{$event->id}}" hidden>
            <button type="submit">Create</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Guest Name</th>
                    <th>Timestamp</th>
                    <th>Action</th>
                </tr>
            </thead>
            @forelse ($guest as $g)
                <tbody>
                    <tr>
                        <th>{{$g->name}}</th>
                        <th>
                            <p>{{$g->created_at}}</p>
                            <p>{{$g->updated_at}}</p>
                        </th>
                        <th>
                            <form action="{{route('guests.destroy',[$g->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('guests.edit',[$g->id])}}">Edit</a>
                                <button type="submit">Delete</button>
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
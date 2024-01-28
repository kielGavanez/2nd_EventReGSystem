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
        <H1>Edit Event</H1>
            <form action="{{route('events.update',[$events->id])}}" method="POST" class="pt-10">
                @csrf
                @method('PUT')
                <label for="eventName">Event Name:</label>
                <input type="text" name="eventName" value="{{$events->eventName}}" required autocomplete="off">
                <label for="location">Location</label>
                <input type="text" name="location" value="{{$events->location}}" required autocomplete="off">
                <label for="date">Date</label>
                <input type="date" name="date" value="{{$events->date}}" required autocomplete="off">
                <button type="submit">Save</button>
            </form>
            <form action="{{route('events.index')}}">
                @csrf
                <button type="submit">Back</button>
            </form>
    </div>
</body>
</html>
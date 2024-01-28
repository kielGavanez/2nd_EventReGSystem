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
            <form action="{{route('guests.update',[$guest->id])}}" method="POST" class="pt-10">
                @csrf
                @method('PUT')
                <div>
                    <label for="name">Event Name:</label>
                    <input type="text" id="name" name="name" value="{{$guest->name}}" required autocomplete="off">
                    <input type="integer" name="eventID" value="{{$guest->eventID}}" hidden>
                    <a href="{{route('events.show',[$guest->id])}}">Back</a>
                    <button type="submit">Save</button>
                    
                </div>    
            </form>
    </div>
</body>
</html>
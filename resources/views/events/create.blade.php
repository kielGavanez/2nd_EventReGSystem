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
    <H1>Create Event</H1>
        <form action="{{route('events.store')}}" method="POST" class="pt-10">
            @csrf
            <label for="eventName">Event Name:</label>
            <input type="text" name="eventName" placeholder="Event Name" required autocomplete="off">
            <label for="location">Location</label>
            <input type="text" name="location" placeholder="Location" required autocomplete="off">
            <label for="date">Date</label>
            <input type="date" name="date" placeholder="Date" required autocomplete="off">
            <button type="submit">Create</button>
        </form>
        <form action="{{route('events.index')}}">
            @csrf
            <button type="submit">Back</button>
        </form>
    </div>
</body>
</html>
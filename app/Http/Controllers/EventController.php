<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Guest;
use Database\Factories\EventFactory;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $events = Event::all();
        Event::create($request->all());
        return redirect('/')->with('events');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::with('guests')->find($id);
        // dd($event);
        if(!$event){
            abort(404);
        }
        $events = Event::find($id);
        $guests = $events->guests;
        $guest = Guest::where('eventID', $event->id)->get();
        return view('events.show', compact('event','guests','guest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $events = Event::find($id);
        return view('events.edit' , compact('events'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $events = Event::find($id)->update($request->all());
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::find($id)->delete();
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Guest::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $events = Event::all();
        $guest = Guest::find($id);
        return view('guests.edit' , compact('guest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $guests = Guest::find($id);
        if ($guests) {
            $guests->update($request->all());
        }
        $event = Event::find($request->eventID);
        $guest = $event->Guests;
        if (!$event) {
            abort(404);
        }
        $Guests = Guest::where('eventID',$request->eventID)->get();
        return view('events.show',[$request->eventID])->with(compact('guests','event','guest'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guest = Guest::find($id)->delete();
        return back();
    }
}

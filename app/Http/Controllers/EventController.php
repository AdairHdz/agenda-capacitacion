<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Contact;
use App\Models\Event;

class EventController extends Controller
{
    function index()
    {
        return view("pages.index-events");
    }

    function create()
    {
        return view("pages.create-event");
    }

    function store(StoreEventRequest $request)
    {
        $validatedData = $request->validated();
        $createdEvent = new Event;
        $createdEvent->title = $validatedData["eventName"];
        $createdEvent->description = $validatedData["eventDescription"];
        $createdEvent->starting_date = date("Y-m-d", strtotime($validatedData["eventStartingDate"]));
        $createdEvent->starting_time = date("H:i", strtotime($validatedData["eventStartingTime"]));        
        $createdEvent->status = $validatedData["eventStatus"];
        $createdEvent->save();

        $eventParticipantsIds = $validatedData["eventParticipants"];

        foreach($eventParticipantsIds as $eventParticipantId)
        {
            $contact = Contact::find($eventParticipantId);
            $createdEvent->contacts()->save($contact);
        }

        return redirect()->route("events.index")->with("successMessage", "Evento correctamente registrado");
    }

    function update(StoreEventRequest $request, $eventId)
    {
        
    }
}

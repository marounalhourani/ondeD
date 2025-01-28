<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Date;

class ScheduleController extends Controller
{
    public function index(){

        $events = Event::with('date')->get();

        return view('admin.Schedule.index', compact('events'));
    }

    public function createDate(){
        return view('admin.Schedule.createDate');
    }

    // Store the new date in the database
    public function storeDate(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255|unique:dates,name',
        ]);

        // Create the date
        Date::create([
            'name' => $request->input('name'),
        ]);

        // Redirect with success message
        return redirect()->route('dates.create')->with('success', 'Date added successfully!');
    }

    public function allDates(){
        $dates = Date::all();
        return view('admin.Schedule.allDates', compact('dates'));
    }

    public function deleteDate($id)
        {
    $date = Date::findOrFail($id);
    $date->delete();

    return redirect()->route('dates.index')->with('success', 'Date deleted successfully.');

        }


    public function editDate($id)
        {
            $date = Date::findOrFail($id);
            return view('admin.schedule.editDate', compact('date'));
        }

        public function updateDate(Request $request, $id)
        {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
        
            $date = Date::findOrFail($id);
            $date->name = $request->name;
            $date->save();
        
            return redirect()->route('dates.index')->with('success', 'Date updated successfully.');
        }
        
        public function createEvent()
        {
            $dates = Date::all(); // Fetch all available dates
            return view('admin.schedule.create-event', compact('dates'));
        }

        public function storeEvent(Request $request)
{
    // Validate the incoming request
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'date_id' => 'required|exists:dates,id', // Ensures date_id exists in the dates table
    ]);

    // Create a new event with the validated data
    Event::create([
        'name' => $validated['name'],
        'description' => $validated['description'],
        'date_id' => $validated['date_id'],
    ]);

    // Redirect back to the events page with a success message
    return redirect()->route('index')->with('success', 'Event created successfully.');
}




public function showEvent($id)
{
    $event = Event::findOrFail($id);
    return view('admin.Schedule.showEvent', compact('event'));
}

  
public function deleteEvent($id)
{
    $event = Event::findOrFail($id);
    $event->delete();

    return redirect()->route('index')->with('success', 'Event deleted successfully');
}

public function editEvent($id)
{
    $event = Event::findOrFail($id);
    $dates = Date::all(); // Get all available dates

    return view('admin.Schedule.editEvent', compact('event', 'dates')); // You'll need to create the edit view

}

public function updateEvent(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:500',
        'date_id' => 'required|exists:dates,id',
    ]);

    $event = Event::findOrFail($id);
    $event->update([
        'name' => $request->name,
        'description' => $request->description,
        'date_id' => $request->date_id,
    ]);

    return redirect()->route('events.show', $event->id)->with('success', 'Event updated successfully');
}

        
}

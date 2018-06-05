<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use App\Event;
use Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = DB::table('events')->get();
        return view('events.index', ['events'=>$events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event;
        $event->title = $request->eventTitle;
        $event->location = $request->eventLocation;
        $event->date = $request->eventDate;
        $event->time = $request->eventTime;

        $event->save();
        Session::flash('success', 'Event created successfully');
        return redirect()->route('events.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        if(Auth::check())
        {
            $registered = DB::table('event_user')
                ->where('user_id', '=', Auth::user()->id)
                ->where('event_id', '=', $id)
                ->first();
        
            if(is_null($registered)){
                $status = 0;
                return view('events.show', compact('event', 'status'));
            }
            else {
                $status = 1;
                return view('events.show', compact('event', 'status'));
            }
        }
        
        return view('events.show', ['event'=>$event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Event;

class EventsUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            if(Auth::user()->is_admin=true){
                $participants = Auth::user()::with('events')->get();
                $events = DB::table('events')
                            ->join('event_user', 'id', '=', 'event_id')
                            ->get();


                return view('admin.participants', [
                    'participants' => $participants,
                    'events' => $events
                ]);
            }
            else {
                return redirect()->route('events.index');
            }
        }
        else {
            return redirect()->route('events.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        DB::table('event_user')->insert([ 'event_id' => $request->event_id, 'user_id' => $request->user_id ]);

        return redirect()->route('events.show', [$request->event_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check()){
            if(Auth::user()->is_admin=true){
                $events = DB::table('event_user')->where('user_id', '=', $id)
                            ->join('events', 'id', '=', 'event_id')
                            ->get();
                return view('admin.selected', ['events' => $events ]);
            }
            else {
                return redirect()->route('events.index');
            }
        }
        else {
            return redirect()->route('events.index');
        }
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

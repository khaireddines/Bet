<?php

namespace App\Http\Controllers;

use App\event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function store(Request $request)
    {
        event::create($request->all());
        return back();
    }
    public function destroy($id)
    {
        event::destroy($id);
        return back();
        
    }
    public function edit(event $event,$id)
    {
        return view('Events.edit',['event'=>$event::find($id)]);
    }
    public function update(Request $request,event $event,$id)
    {
        $event::where('id',$id)->update($request->except(['_token']));
        return back();
    }
}

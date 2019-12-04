<?php

namespace App\Http\Controllers;

use App\event;
use App\MyBet;
use App\vehicule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Vehicule/show', ['vehicules' => vehicule::all(), 'events' => event::all()]);
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

        Image::make($request->file('picture'))->resize(320, 240)->save(public_path('img/' . $request->file('picture')->getClientOriginalName()));
        vehicule::create($request->except('picture') + ['prise_rised_to' => $request->prise_init, 'picture' => $request->file('picture')->getClientOriginalName()]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function show(vehicule $vehicule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function edit(vehicule $vehicule, $id)
    {
        $veh = $vehicule::find($id);

        return view('Vehicule.edit', ['veh' => $veh]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vehicule $vehicule, $id)
    {
        Image::make($request->file('picture'))->resize(320, 240)->save(public_path('img/' . $request->file('picture')->getClientOriginalName()));
        $vehicule::where('id', $id)->update($request->except('_token', 'picture') + ['picture' => $request->file('picture')->getClientOriginalName()]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function destroy(vehicule $vehicule, $id)
    {
        $vehicule::destroy($id);
        return back();
    }
    public function showallVeh(vehicule $vehicule)
    {
        $event = event::where('time', Carbon::now()->toDateString())->first();
        $newEvent=event::orderBy('time')->get();
        
        try {
            $veh=$vehicule::where('place', $event->place)->get();
        } catch (\Throwable $th) {
            $veh=null;
        }
        return view('homepage', ['vehicule' => $veh, 'event'=> $event,'newEvent'=>$newEvent]);
    }
    public function showallVehEvent()
    {
        //TODO
    }
    public function updateBet(Request $request)
    {

        $vehicule = vehicule::where('id', $request->objectId)->get();
        $veh = $vehicule[0];

        if ($request->betprise > $veh->prise_rised_to) {
            try {
                MyBet::Create(
                    [
                        'user_id' => $request->user()->id,
                        'object_id' => $request->objectId,
                        'bet_prise' => $request->betprise
                    ],
                    
                );
                
            } catch (\Throwable $th) {
                MyBet::where('user_id',$request->user()->id)
                ->where('object_id',$request->objectId)
                ->update(['bet_prise'=>$request->betprise]);
            }

            vehicule::where('id', $request->objectId)->update(['prise_rised_to' => $request->betprise]);
            $result = $request->betprise;
        } else {
            $result = "sorry the prise rised higher then you've put";
        }


        return $result;
    }
}

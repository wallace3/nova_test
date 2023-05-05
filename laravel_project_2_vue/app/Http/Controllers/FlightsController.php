<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flights;
use DB;

class FlightsController extends Controller
{
    public function index(){
        $flights = Flights::all()->toArray();
        return array_reverse($flights);
    }

    public function store(Request $request){
        $flight = new Flights([
            'code' => $request->input('code'),
            'departure_id' => $request->input('departure_id'),
            'destination_id' => $request->input('destination_id'),
            'departure_time' => $request->input('departure_time'),
            'arrival_time' => $request->input('arrival_time'),
            'airline_id' => $request->input('airline_id') ,
        ]);
        if($flight->save()){
            return response()->json('flight created');
        }else{
            return response()->json('some error ocurred.');
        }
    }

    public function show($id)
    {
        $flight = Flights::find($id);
        return response()->json($flight);
    }

    public function update($id, Request $request)
    {
        $flight = Flights::find($id);
        $flight->update($request->all());
        return response()->json('flight updated!');
    }

    public function destroy($id)
    {
        $flight = Flights::find($id);
        $flight->delete();
        return response()->json('flight deleted!');
    }

    public function getFlightsRelated(){
        $flights = DB::table('flights')
            ->join('airlines', 'flights.airline_id', '=', 'airlines.id')
            ->join('airports', 'flights.departure_id', '=', 'airports.id')
            ->join('airports as destination', 'flights.destination_id', '=', 'destination.id')
            ->select('flights.*', 'airlines.name as airline ', 'airports.name as departure', 'destination.name as destination' )
            ->get()->toArray();
            return array_reverse($flights);
    }

}

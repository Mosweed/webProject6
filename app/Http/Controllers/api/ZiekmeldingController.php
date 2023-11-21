<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ziekmelding;
use Illuminate\Http\Request;

class ZiekmeldingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $employee_id = auth()->user()->employee->id;

        $ziekmelding = ziekmelding::create([
            'employee_id' => $employee_id,
            'date' => $request->date,
            'time' => $request->time,
            'date_end' => $request->date_end,
            'time_end' => $request->time_end,
            'reason' => $request->reason,
        ]);
        $content =
            [
                'success' => true,
                'data' => $ziekmelding,
                'message' => 'Ziekmelding is aangemaakt',
            ];

        return response()->json([$content], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
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

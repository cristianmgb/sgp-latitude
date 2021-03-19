<?php

namespace App\Http\Controllers;

use App\Models\Associate;
use App\Http\Requests\AssociateRequest;
use App\Http\Requests\AssociateEditRequest;

class AssociatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('associates.index')->with('associates', Associate::withTrashed()->Paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('associates.create')->with('states', $this->get_states());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AssociateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssociateRequest $request)
    {
        $associate = new Associate;
        $associate->first_name     = $request->first_name;
        $associate->last_name      = $request->last_name;
        $associate->email          = $request->email;
        $associate->identification = $request->identification;
        $associate->phone          = $request->phone;
        $associate->status         = $request->status;
        $associate->save();

        return redirect('associates/create')->with('message', 'Asociado creado satisfactoriamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('associates.show')->with('associate', Associate::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('associates.edit')
                ->with('associate', Associate::findOrFail($id))
                ->with('states', $this->get_states());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\AssociateEditRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AssociateEditRequest $request, $id)
    {
        $associate = Associate::findOrFail($id);
        $associate->update($request->all());

        return redirect()->route('associates.edit' , $associate)
                ->with('message', 'Asociado editado satisfactoriamente !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $associate = Associate::findOrFail($id);
        $associate->delete();

        return redirect()->route('associates.index')->with('message', 'Asociado suspendido satisfactoriamente !');
    }
}
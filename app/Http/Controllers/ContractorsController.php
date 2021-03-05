<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use App\Http\Requests\ContractorRequest;
use App\Http\Requests\ContractorEditRequest;

class ContractorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contractors.index')->with('contractors', Contractor::Paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contractors.create')->with('states', $this->get_states());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ContractorRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContractorRequest $request)
    {
        $contractor = new Contractor;
        $contractor->name        = $request->name;
        $contractor->description = $request->description;
        $contractor->status      = $request->status;
        $contractor->save();

        return redirect('contractors/create')->with('message', 'Contratista creado satisfactoriamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('contractors.show')->with('contractor', Contractor::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('contractors.edit')
                ->with('contractor', Contractor::findOrFail($id))
                ->with('states', $this->get_states());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ContractorEditRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContractorEditRequest $request, $id)
    {
        $contractor = Contractor::findOrFail($id);
        $contractor->update($request->all());

        return redirect()->route('contractors.edit' , $contractor)
                ->with('message', 'Contratista editado satisfactoriamente !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contractor = Contractor::findOrFail($id);
        $contractor->delete();

        return redirect()->route('contractors.index')->with('message', 'Contratista eliminado satisfactoriamente !');
    }
}
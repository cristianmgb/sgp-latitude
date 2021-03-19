<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use App\Http\Requests\TaxRequest;
use App\Http\Requests\TaxEditRequest;

class TaxesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('taxes.index')->with('taxes', Tax::withTrashed()->Paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('taxes.create')->with('states', $this->get_states());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TaxRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaxRequest $request)
    {
        $tax = new Tax;
        $tax->name        = $request->name;
        $tax->description = $request->description;
        $tax->status      = $request->status;
        $tax->save();

        return redirect('taxes/create')->with('message', 'Impuesto creado satisfactoriamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('taxes.show')->with('tax', Tax::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('taxes.edit')
                ->with('tax', Tax::findOrFail($id))
                ->with('states', $this->get_states());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\TaxEditRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaxEditRequest $request, $id)
    {
        $tax = Tax::findOrFail($id);
        $tax->update($request->all());

        return redirect()->route('taxes.edit' , $tax)
                ->with('message', 'Impuesto editado satisfactoriamente !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tax = Tax::findOrFail($id);
        $tax->delete();

        return redirect()->route('taxes.index')->with('message', 'Impuesto suspendido satisfactoriamente !');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Http\Requests\PolicyRequest;
use App\Http\Requests\PolicyEditRequest;

class PoliciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('policies.index')->with('policies', Policy::Paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('policies.create')->with('states', $this->get_states());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PolicyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PolicyRequest $request)
    {
        $olicy = new Policy;
        $olicy->name        = $request->name;
        $olicy->description = $request->description;
        $olicy->status      = $request->status;
        $olicy->save();

        return redirect('policies/create')->with('message', 'Póliza creada satisfactoriamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('policies.show')->with('policy', Policy::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('policies.edit')
                ->with('policy', Policy::findOrFail($id))
                ->with('states', $this->get_states());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PolicyEditRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PolicyEditRequest $request, $id)
    {
        $policy = Policy::findOrFail($id);
        $policy->update($request->all());

        return redirect()->route('policies.edit' , $policy)
                ->with('message', 'Póliza editada satisfactoriamente !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Policy $policy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Policy $policy)
    {
        //
    }
}
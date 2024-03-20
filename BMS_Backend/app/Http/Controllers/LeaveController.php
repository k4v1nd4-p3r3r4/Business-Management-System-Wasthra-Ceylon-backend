<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;


class LeaveController extends Controller
{

    protected $leave;

    public function __construct()
    {
        $this-> leave  = new Leave();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->leave->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->leave->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $leave = $this->leave->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $leave = $this->leave->find($id);
        $leave->update($request->all());
        return $leave;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $employee = $this->employee->find($id);
        //    return $employee->delete();

        $leave = $this->leave->find($id);
        return $leave->delete();
    }
}

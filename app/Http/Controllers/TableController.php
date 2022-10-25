<?php

namespace App\Http\Controllers;

use App\Models\table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $tables = table::all();
        return view('table.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('table.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'table_number' => 'required',
        ]);
        if(table::where('table_number', $request->get('table_number'))->first()){
            return redirect()->back()->withErrors('Table Number already exists');
        }
        $table = [
            "table_number" => $request->get('table_number'),
        ];
        table::create($table);
        return redirect()->route('backoffice.table.index')->with('success', 'Table has been added');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tables = table::find($id);

        return view('table.edit', compact('tables','tables'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'table_number' => 'required',
        ]);
        if(table::where('table_number', $request->get('table_number'))->first()){
            return redirect()->back()->withErrors('Table Number already exists');
        }
        $table = [
            "table_number" => $request->get('table_number'),
        ];
        table::find($id)->update($table);
        return redirect()->route('backoffice.table.index')->with('success', 'Table has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = table::findorFail($id);
        $table->delete();
        return redirect()->route('backoffice.table.index')->with('success', 'Table has been deleted');
    }
}

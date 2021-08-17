<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Phone::orderBy('created_at', 'desc')->paginate(10);
        return View('phone.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Phone();
        return View('phone.form', ["item" => $item, 'type' => 'add']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->runValidate($request);
        Phone::create($request->all());
        return redirect()->back()->with(['success' => 'Create success!']);
    

    }

    public function runValidate(Request $request)
    {
        return $request->validate([
            'name' => 'required',
            'price' => 'required',
            'inventory_quantity' => 'required',
            'provider_id' => 'required',
            'description' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Phone::find($id);
        return View('phone.form', ["item" => $item, 'type' => 'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->runValidate($request);
        $item = Phone::find($id);
        $item->update($request->all());
        return redirect()->back()->with(['success' => 'Update success!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Phone::where('id', $id)->delete();
        return Redirect(route('phones.index'));
    }
}

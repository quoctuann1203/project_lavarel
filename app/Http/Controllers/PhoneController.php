<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PhoneController extends Controller
{

    function __construct()
    {
        $this->middleware(['role:admin,editor'])->except('index');
    }

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
        return View('phone.form', ["item" => $item, 'type' => 'add', 'providerSelectData'=>$this->getProviderSelectData()]);
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
        $data = $this->getProviderSelectData();

        return View('phone.form', ["item" => $item, 'type' => 'edit', 'providerSelectData'=>$data]);
    }

    public function getProviderSelectData(){
        $provider= new Provider();
        return $provider->listSelectData();
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
        $updateData = $request->all();
        if ($request->file()) {
            $fileName = $request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');
            //tham số thứ 3 là chỉ lưu trên disk 'public', tham số thứ 1:  lưu trong thư mục 'uploads' của disk 'public'
            $updateData['image'] = '/storage/' . $filePath;
            // $filepath='uploads/'+$fileName --> $profile->avatar = 'storage/uploads/tenfile --> đường dẫn hình trong thư mục public
        }
        $item->update($updateData);
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

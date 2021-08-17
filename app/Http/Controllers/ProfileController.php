<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = $this->runValidate($request);
        if ($validate) {
            $userId = $request->input('user_id');
            $item = [
                'user_id' => $userId,
                'full_name' => $request->input('full_name'),
                'address' => $request->input('address'),
                'avatar' => $request->input('avatar'),
                'gender' => $request->input('gender'),
                'birthday' => $request->input('birthday'),
            ];
            //$profile = new Profile();
            //$profile->full_name = $request->input('full_name');
            // $profile->address = $request->input('address');
            // $profile->birthday = $request->input('birthday');
            // var_dump($profile);
            $affected = DB::table('profiles')
                ->insert($item);
            return redirect()->route('profiles.show', ["profile" => $userId]);
        }
        $msg = "cap nhat that bai";
        return back()->with('error', $msg);
    }

    public function createProfile($id)
    {
        $profile = new Profile();
        return View('profile.create', ["profile" => $profile, 'user_id' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile =  DB::table('profiles')->where('user_id', $id)->first();
        $user =  DB::table('users')->find($id);
        return View('profile.show', ['profile' => $profile, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile =  DB::table('profiles')->find($id);
        return View('profile.edit', ['profile' => $profile]);
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
        $validate = $this->runValidate($request);

        /* $profile = new Profile();
        $profile->full_name = $request->input('full_name');
        $profile->address = $request->input('address');
        $profile->birthday = $request->input('birthday');
        $profile->gender = $request->input('gender');
        $profile->avatar = $request->input('avatar');
        var_dump($profile);
        $affected = DB::table('profiles')
            ->where('id', $id)
            ->update(['full_name' =>  $profile->full_name,
                'address' =>  $profile->address,
                'birthday' =>  $profile->birthday,
                'gender' =>  $profile->gender,
                'avatar' =>  $profile->avatar
            ]);
        return redirect()->route('profiles.show', [$id]);
//        return Redirect(route('profiles.show'));;
       */
        if ($validate) {
            $profile = Profile::find($id);
            $profile->full_name = $request->input('full_name');
            $profile->address = $request->input('address');
            $profile->birthday = $request->input('birthday');
            $profile->gender = $request->input('gender');
            if ($request->file()) {
                $fileName = $request->file('avatar')->getClientOriginalName();
                $filePath = $request->file('avatar')->storeAs('uploads', $fileName, 'public');
                //tham số thứ 3 là chỉ lưu trên disk 'public', tham số thứ 1:  lưu trong thư mục 'uploads' của disk 'public'
                $profile->avatar = '/storage/' . $filePath;
                // $filepath='uploads/'+$fileName --> $profile->avatar = 'storage/uploads/tenfile --> đường dẫn hình trong thư mục public
            }
            $profile->save(); //lưu
            return back() //trả về trang trước đó
                ->with('success', 'Profile1 has updated.') //lưu thông báo kèm theo để hiển thị trên view
                ->with('file', $fileName);
        }
        $msg = "cap nhat that bai";
        return back()->with('error', $msg);
    }

    public function runValidate(Request $request)
    {
        return $request->validate([
            'avatar' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'birthday' => 'nullable|date',
            'full_name' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'avatar' => 'required'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function showprofileuser($id){
        $profile=User::findOrFail($id);
        return view('client.home.profile',compact('profile'));
    }
    public function showprofileuseredit($id){
        $tt=User::findOrFail($id);
        return view('client.home.editprofile',compact('tt'));
    }
    public function showprofileadmin($id){
        $profile=User::findOrFail($id);
        return view('admin.home.profile',compact('profile'));
    }
    public function showprofileadminedit($id){
        $tt=User::findOrFail($id);
        return view('admin.home.editprofile',compact('tt'));
    }
    public function editProfile($id, UserRequest $request ){

        $detailUser=User::findOrFail($id);
        $data=$request->all();
    
        $detailUser->update($data);
        return redirect()->route('profile.user',$detailUser->id)->with([
            'messageSucess' => 'Cập nhật thong tin thành công'
        ]);
    }
    public function editProfileAdmin($id, UserRequest $request ){
        $detailUser=User::findOrFail($id);
        $data=$request->all();
        $detailUser->update($data);
        return redirect()->route('profile.admin',$detailUser->id)->with([
            'messageSucess' => 'Cập nhật thong tin thành công'
        ]);
    }
}

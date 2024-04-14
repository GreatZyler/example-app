<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Chat;
use App\Models\friend_request;

use Illuminate\Http\Request;

class FriendsController extends Controller
{
    public function search(Request $request){
        $authFriends = json_decode(auth()->user()->friends);
        $auth_id=auth()->user()->id;

        $users=User::where('id','!=',$auth_id)->where("first_name",'LIKE','%'.$request->text.'%')
                    ->orWhere("second_name",'LIKE','%'.$request->text.'%')->orderBy("id","DESC")->get();
        $req=friend_request::get();



        return response()->json(['users'=>$users,'request'=>$req,'owner'=>json_decode(auth()->user()->friends)]);
    }

    public function Add(Request $request) {

        $user=User::find($request->num);
        $friends=json_decode($user[0]->friends);
        $tr=array_push($friends,auth()->user()->id);

        $user->update([
            'friends'=>$tr
        ]);
        
        $gh=User::find($request->num);
        return $gh;
    }


    public function  Res(Request $request) {
        friend_request::create([
            'from_id'=>auth()->user()->id,
            'for_id'=>$request->num
        ]);

        return ['name'=>"Request Sent"];
    }


    public function cancel(Request $request) {
       $gth= friend_request::destroy($request->num);
       return ['name'=>$gth];  
    }


    public function accept(Request $request){
        $user_id=$request->user_id;
        $data_id=$request->data_id;
        $gth= friend_request::where("from_id",'=',$user_id)->delete();


        $authFriends = json_decode(auth()->user()->friends);
        $new_arr=array_push($authFriends,$user_id);
        
        $up=User::find(auth()->user()->id);
        $up->update([
            'friends'=>$authFriends
        ]);


        $down=User::find($user_id);
        $d_frie=json_decode($down->friends);
        array_push($d_frie,auth()->user()->id);
        $down->update([
            'friends'=>$d_frie
        ]);

        return ['name'=>$new_arr,'data'=>$new_arr];
    }



    // selecting only friends

    public function friend(){
        $auth=auth()->user()->id;
        $authFriends = json_decode(auth()->user()->friends);
        $friends=User::where('id','!=',$auth)->whereIn('id',$authFriends)->get();

        $requestId=friend_request::where("for_id",'=',$auth)->pluck('from_id');

        $reUser=User::whereIn("id",$requestId)->orderBy("id",'DESC')->get();
      

    return view('friend',['friends'=>$friends,'request'=>$reUser]);
    }

}


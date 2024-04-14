<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use Illuminate\Support\Facades\DB;


class ChatController extends Controller
{
 
    public function chat(Request $request) {
        $chat = new Chat();

      
       
          
        $chat->user_id=$request['owner_id'];
            $chat->for_id=$request['reciever_id'];
            $chat->message=$request['message'];
            $chat->chat_id=$request['chat_id'];
            $chat->check=$request['check'];
            
$chat->save();
$user=User::where("id",'=',$chat->user_id)->get();
        broadcast(new \App\Events\playgroundEvent($request->message,$chat))->toOthers();
        //broadcast(new \App\Events\presenceEvent($chat))->toOthers();
        broadcast(new \App\Events\Sent($chat,$user))->toOthers();
   
       
       return null;
    }

 

    

    public function room($id){
        
        $auth=auth()->user()->id;



$friends = DB::select('SELECT chats.*, users.*
FROM (
    SELECT chat_id, MAX(id) AS latest_id
    FROM chats
    WHERE user_id = ? OR for_id = ?
    GROUP BY chat_id
) AS latest_chats
INNER JOIN chats ON latest_chats.latest_id = chats.id
INNER JOIN users ON (chats.for_id = users.id OR chats.user_id = users.id) AND users.id != ?
ORDER BY chats.id DESC
', [$auth,$auth,$auth]);


        $now=User::where('id','=',$id)->get();

        $chatid1=$auth.$now[0]['id'];

        $chatid2=$now[0]['id'].$auth;

        $check=Chat::where('chat_id','=',$chatid1)->orWhere("chat_id",'=',$chatid2)->get();

        if (count($check) !=0) {
            $chat=Chat::where('user_id','=',$auth)->orWhere('for_id','=',$auth)->get();

        return view("chat",['messages'=>$check,'user'=>$now,'chat_id'=>$check,'friends'=>$friends]);
        }else{

                $chat = new Chat();;
       
          
                $chat->user_id=$auth;
                    $chat->for_id=$id;
                    $chat->message='ui';
                    $chat->chat_id=$chatid1;
                    $chat->check='unread';
        $chat->save();

            


            $check=Chat::where('chat_id','=',$chatid1)->orWhere("chat_id",'=',$chatid2)->get();

            return view("chat",['messages'=>$check,'user'=>$now,'chat_id'=>$check,'friends'=>$friends]);
        }

       
    }


    //read message

    public function read(Request $request){
  $id=$request->text;


        $chats=Chat::whereIn("id",$id)->update([
            'check'=>"read"
        ]);

        return $chats;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Throwable;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user =Auth::user();
       $conversation= $user->conversations()->with(['participants'=>
       function($builder) use($user){
           $builder->where('id','<>',$user->id);
       
       }])
       ->findOrFail($id);
       return [
        'conversation'=>$conversation,
       'messages'=> $conversation->messages()->with('user')->paginate()] ;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
        'message'=>['required','string'],
        'conversation_id'=>['required_if',
        Rule::requiredIf(function() use ($request){
            return !$request->input('user_id');
        }),
        'int',
        'exists:conversations,id'],
        'user_id'=>[
            Rule::requiredIf(function() use ($request) {
                return !$request->input('conversation_id');
            }),
            
            'int','exists:users,id'],
       ]);
       $user=Auth::user();
      //  $user=User::find(2);//Auth::user();
       
       $conversation_id=$request->post('conversation_id');
       $user_id=$request->post('user_id');
     
       DB::beginTransaction();
       try{ 
         if($conversation_id){
        $conversation= $user->conversations()->findOrFail($conversation_id);

         }else{
           $conversation=Conversation::where('type','=','peer')
           ->whereHas('participants',function($builder) use($user_id,$user){
           $builder->join('participants as participants2 ','participants2.conversation_id','=','participants.conversation_id')
           ->where('participants.user_id','=',$user_id)
           ->where('participants2.user_id','=',$user->id);

           })->first();
           if (!$conversation ){
            $conversation =Conversation::create([
                'user_id'=> $user->id,
                'type'=>'peer',

            ]);
            $conversation->participents()->attach([
             $user->id=>['joined_at'=>now()] ,
              $user_id=>['joined_at'=>now()],
           
        
            ]);
           }
         }
       $message =$conversation->messages()->create([
        'user_id'=>$user->id,
        'body'=>$request->post('message'),
       ]);

     DB::statement('INSERT INTO recipients (user_id,message_id)
     SELECT (user_id, ? FROM participents
     WHERE conversation_id=?
     
     ',[$message->id,$conversation->id]);
        $conversation->update([
          'last_message_id'=>$message->id,
        ]);

    DB ::commit(); 
    $message->load('user');
     broadcast(new MessageCreated($message));
    
    }catch(Throwable $e){
        DB::rollBack();
        throw $e;
        
     }
      return $message;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Recipient::where([
        'user_id'=>Auth::id(),
        'message_id'=>$id,
      ])->delete();
      return[ 'message'=>'deleted',
      ];
       
    }
  
}
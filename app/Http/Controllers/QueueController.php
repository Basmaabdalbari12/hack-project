<?php

namespace App\Http\Controllers;

use App\Queue;
use Illuminate\Http\Request;

class QueueController extends Controller
{
     public function store(Request $request){
       
        $this->validate($request,[
            'name' => 'required',
            'service' => 'required',
            
      ]);
         
        $queue = new Queue();
        $queue->name = $request->name;
        $queue->service = $request->service;
        $queue->status = false;
        $queue->save();
      return redirect()->route('welcome')->with('successMsg','Request Successfully Sent');
    }
    public function show(){

      return view ('admin.queue.show');
      // ,compact('queue'));
    }
    public function search(Request $request ){
      $search = $request->get('search');
      $queue=queue::where('name','like','%'.$search.'%')->paginate(5);
      return view('queue.index',['queue'=>$queue]);
  
  
  }
}

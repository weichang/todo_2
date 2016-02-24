<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
class TasksController extends Controller
{
    //
    public function index(){

    	$tasks=Task::orderBy('created_at','desc')->get();
    	$data=['tasks'=>$tasks];
 		return view('tasks.index',$data);

    }
    public function store(Request $request){

     //echo $request->input('name');
    	$this->validate($request,['name'=>'required']);
    	Task::create($request->all());
    	return redirect('/tasks');
    }
    public function update($tasks){

    	$task= Task::find($tasks);
    	$task->done =true;
    	$task->save();
    	return redirect('/tasks');

    }
    public function destroy($tasks){

    	$task= Task::find($tasks);
    	$task->delete();
    	return redirect('/tasks');
    }
}

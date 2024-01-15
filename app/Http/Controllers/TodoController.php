<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //

    public function getTodos(){
        if(session()->has('user-token')){
            $todos = Todo::all();
            return view('dashboard',['todos'=>$todos]);
        }
        else{
            return redirect('/login')->with('message','Login to create todo 😁!');
        }
       
    }

    public function handleAddTodo(Request $request){
        $data = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'level'=>'required',
            'due_date'=>'required',
        ]); 

        $todo = Todo::create($data);
        // return $todo;
        return redirect('/dashboard')->with('message','Recorded Added Successfully👍!');
    }

    public function editTodo(Todo $todo){
        if(session()->has('user-token')){
        return view('edit_todo',['todo'=>$todo]);
        }
        else{
            return redirect('/login')->with('message','Login to continue 😁!');
        }

      }

      public function handleEditTodo(Request $request, Todo $todo){
        if(session()->has('user-token')){
        $data = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'level'=>'required',
            'due_date'=>'required',
        ]); 
                if($data){
                    $todo->update($data);
                    return redirect('/dashboard')->with('message','Updated Record Successfully👍!');
                }
            }
        else{
            return redirect('/login')->with('message','Login to continue 😁!');
        }
    }
}

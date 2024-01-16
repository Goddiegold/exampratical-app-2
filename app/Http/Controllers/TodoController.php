<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{

    public function getTodos(Request $request)
{
    if (session()->has('user-token')) {
        $todosQuery = Todo::where('user_id', session('user-token')->id)->with('user');

        // Filter by level
        $level = $request->input("level");
        if ($level) {
            $convertToLowercase = strtolower($level);
            if($convertToLowercase === "high" || $convertToLowercase === "low" || $convertToLowercase === "medium"){
                $todosQuery->where('level', $level);
            }
        }

        $todos = $todosQuery->get();

        return view('dashboard', ['todos' => $todos]);
    } else {
        return redirect('/login')->with('message', 'Login to create todo 😁!');
    }
}


    public function handleAddTodo(Request $request){
        if(session()->has('user-token')){
        $data = $request->validate([
            'title'=>'required|string',
            'level'=>'required|string',
            'due_date'=>'required',
            'description'=>'required|string',
        ]); 

        $todo = Todo::create([
            'title'=>$data['title'],
            'description'=>$data['description'],
            'level'=>$data['level'],
            'due_date'=>$data['due_date'],
            'user_id'=>session('user-token')->id]);
        return redirect('/dashboard')->with('message','Recorded Added Successfully👍!');
        } else{
            return redirect('/login')->with('message','Login to continue 😒!');
        }
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

    public function deleteTodo(Request $request, Todo $todo){
        if(session()->has('user-token')){

            if($todo->user_id !== session('user-token')->id){
                return redirect("/dashboard")->with('message',"The Record Doesn't Belong To You 😒!");
            }else{
                $todo->delete();
                return redirect("/dashboard")->with('message','Deleted Record Successfully👍!');
                // return $todo;
            }
        } else{
            return redirect('/login')->with('message','Login to continue 😁!');
        }
    }

    public function viewTodo(Todo $todo){
        if(session()->has('user-token')){
        return view('view_todo',['todo'=>$todo]);
        }
        else{
            return redirect('/login')->with('message','Login to continue 😒!');
        }
      }
}


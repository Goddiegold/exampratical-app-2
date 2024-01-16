<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    //

    public function getTodos(){
        if(session()->has('user-token')){

            $todos = DB::table('todos')
            ->join('users', 'todos.user_id', '=', 'users.id')
            ->select('todos.*', 'todos.*')->where('todos.user_id', session('user-token')->id)->get();

            // // $posts = DB::table('users')
            // // ->join('posts', 'users.id', '=', 'posts.user_id')
            // // ->select('users.name', 'users.email', 'posts.*')
            // // ->where('users.id', session('user-token')->id)
            // // ->get();

            // //left join
            // $posts = DB::table('users')
            // ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
            // ->select('users.*', 'posts.*')
            // ->where('users.id', session('user-token')->id)
            // ->get();

            //right join
    //         $posts = DB::table('posts')
    // ->rightJoin('users', 'posts.user_id', '=', 'users.id')
    // ->select('users.*', 'posts.*')
    // ->where('users.id', session('user-token')->id)
    // ->get();
            return view('dashboard',['todos'=>$todos]);
            // return ['data'=>$posts];
        }
        else{
            return redirect('/login')->with('message','Login to create todo 😁!');
        }
       
    }

    public function handleAddTodo(Request $request){
        $data = $request->validate([
            'title'=>'required',
        ]); 

        $post = Todo::create(['title'=>$data['title'], 'user_id'=>session('user-token')->id]);
        // return $todo;
        return redirect('/dashboard')->with('message','Recorded Added Successfully👍!');
    }

    public function editTodo(Todo $todo){
        if(session()->has('user-token')){
        return view('edit_todo',['todo'=>$todo]);
        // return $todo;
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

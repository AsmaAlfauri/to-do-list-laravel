<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
    //show the data
    public function index()
    {
        $user_id=Auth::id();
        $todos = Todo::where('user_id',$user_id)->get();
//        $user=User::findOrFail($user_id);
//        $todo=$user->tasks()->get();
        return view('todos.index')->with('todos', $todos);
    }

    public function show($todoId)
    {
        return view('todos.show')->with('todo', Todo::find($todoId));
    }


    ///////////////////////////////////////////////////////////
    //create data
    public function create()
    {
return view('todos.create');
    }

    public function store()
    {
        //validation form
        $this->validate(request(),[
            'name'=>'required|min:4|max:12',
            'description'=>'required',
        ]);

        //get data from the req.
        $user_id=Auth::id();
        $data = request()->all();
        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;
        $todo->user_id=$user_id;
        $todo->save();
        return redirect('/todos');
    }



    /////////////////////////////////////////////////////////////////
    //edit data
    public function edit($todoId){
        $todo=Todo::find($todoId);
        return view('todos.edit')->with('todo',$todo);
    }

    public function update ($todoId){

        $this->validate(request(),[
            'name'=>'required|min:4|max:12',
            'description'=>'required'
        ]);
        $user_id=Auth::id();
        $data=request()->all();
        $todo=Todo::find($todoId);
        $todo->user_id=$user_id;
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();
        return redirect('/todos');
    }



    /////////////////////////////////////////////////////////////
    /// delete data

    public function destroy($todoId){
       $todo=Todo::find($todoId);
       $todo->delete();
       return redirect('/todos');
    }
}

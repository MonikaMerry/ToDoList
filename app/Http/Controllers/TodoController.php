<?php

namespace App\Http\Controllers;

use App\Models\Tododata;
use App\Models\Tododatas;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class TodoController extends Controller
{
    //view page

    public function viewPage()
    {
        $list = Tododatas::get();
        return view('welcome', compact('list'));
    }

    //save

    public function todoList(Request $request)
    {
        $validated = $request->validate([
            'todo' => 'required',
        ]);

        $data = new Tododatas();
        $data->todo = $request->todo;
        // return $data;
        $data->save();

        return back()->with('success', 'Task Created successfully');
    }

    public function deleteTodo($id)
    {
        $delete = Tododatas::find($id);
        $delete->delete();

        return back()->with('danger', 'Task Deleted Successfully');
    }
}

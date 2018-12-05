<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\TaskModel;
use App\Model\PriorityModel;
use App\Model\SystemMessageModel;

class TaskController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | GETTERS
    |--------------------------------------------------------------------------
    | @BDR.
    */
    public function getCreate()
    {
        return view('task.task-create')
        ->with(['priority'=>PriorityModel::all()]);
    }

    public function getList()
    {
        return view('task.task-list')
        ->with([
            'task' => TaskModel::all()
        ]);
    }

    public function getEdit($id)
    {
        return view('task.task-edit')
        ->with([
            'task' => TaskModel::where('id','=',$id)->first(),
            'priority'=>PriorityModel::all()
        ]);
    }

    public function getPriority()
    {
        return view('task.task-priority')
        ->with([
            'task' => TaskModel::all(),
            'priority'=>PriorityModel::all()
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | POSTTERS
    |--------------------------------------------------------------------------
    | @BDR.
    */
    public function postCreate(Request $request)
    {
        $request->validate([            
            'Titulo' => 'required',
            'Descricao' => 'required'     
        ]);

        $task = TaskModel::create([
            'name' => $request->Titulo,
            'description' => $request->Descricao,
            'priority_id' => $request->Prioridade
        ]);

        if($task)
        return redirect()->route('task.getlist')
            ->with('success',SystemMessageModel::where('code','=',1)->first()->name);

        return redirect()->back()
            ->with('error',SystemMessageModel::where('code','=',2)->first()->name); 
    }

    /*
    |--------------------------------------------------------------------------
    | PUTTERS
    |--------------------------------------------------------------------------
    | @BDR.
    */
    public function putEdit(Request $request, $id)
    {
        $request->validate([            
            'Titulo' => 'required',
            'Descricao' => 'required'     
        ]);
        
        $task = TaskModel::where('id','=',$id)
        ->update([
            'name' => $request->Titulo,
            'description' => $request->Descricao,
            'priority_id' => $request->Prioridade
        ]);

        if($task)
        return redirect()->route('task.getlist')
            ->with('success',SystemMessageModel::where('code','=',3)->first()->name);

        return redirect()->back()
            ->with('error',SystemMessageModel::where('code','=',4)->first()->name);
    }

    /*
    |--------------------------------------------------------------------------
    | DELETTERS
    |--------------------------------------------------------------------------
    | @BDR.
    */
    public function Delete($id)
    {
        if(TaskMOdel::where('id','=',$id)->delete())
        return redirect()->route('task.getlist')
            ->with('success',SystemMessageModel::where('code','=',5)->first()->name);

        return redirect()->back()
            ->with('error',SystemMessageModel::where('code','=',6)->first()->name);
    }
}

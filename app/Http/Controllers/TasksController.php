<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{

    public function index()
    {
        $id = request()->id??0;
        $projects = Projects::all();
        $tasks = Tasks::when($id != 0, function ($q) use ($id) {
            return $q->where('project_id', $id);
        })->orderBy('priority','ASC')->get();
        return view('tasks.index', compact('tasks','projects'));
    }


    public function create()
    {
        $projects = Projects::all();
        if(empty($projects)){
            return redirect()->route('tasks')->with('status', 'Add Project first');
        }
        return view('tasks.form',compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'priority' => 'nullable|integer',
        ]);
        $task = Tasks::create([
            'name' => $request->name,
            'priority' => $request->priority ?? 1,
            'project_id' => $request->project ?? 0,
        ]);
        return redirect()->route('tasks')->with('status', 'Task added!');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tasks $task)
    {
        $projects = Projects::all();
        return view('tasks.form', compact('task','projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tasks $task)
    {
        $validate = $request->validate([
            'name' => 'required',
            'priority' => 'nullable|integer',
        ]);
        $task->update([
            'name' => $request->name,
            'priority' => $request->priority ?? 1,
            'project_id' => $request->project ?? 0,
        ]);
        return redirect()->route('tasks')->with('status', 'Task updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tasks $task)
    {
        $task->delete();
        return redirect()->route('tasks')->with('status', 'Task deleted!');
    }

    public function sequence(Request $request){
        // dd($request->all());
        foreach ($request->priority as $key => $priority) {
            $post = Tasks::where('id',$priority['id'])->update(['priority' => $priority['priority']]);
        }
        return response()->json(['success' => true]);
    }
}

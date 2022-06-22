<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->filled('search')){
            $agents = Agent::search($request->search)->paginate(10);
           
        }
        
       else{ 
           $agents = Agent::latest()->paginate(10);
       }
        return view('backend.agent.index',compact('agents'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.agent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'uuid'=>'required|unique:agents|max:500',
            'line' => 'required|max:255',
        ]);
        if ($validator->fails()) {
           
            Alert::error('Error Title', $validator->errors()->all());
            return back()->withErrors($validator)            
                         ->withInput();
         }
         $newAgent=new Agent();
         $newAgent->create($request->all());
         alert()->html("Agent is created successfully.",'<a href="/agent"  class="btn btn-primary"> Back </a> 
         <a href="/agent/create"  class="btn btn-primary"> Stay</a>',"success");
         return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        return view('backend.agent.show',compact('agent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {
        return view('backend.agent.edit',compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        if($request->uuid ==$agent->uuid){
        $validator=Validator::make($request->all(),[
            'uuid'=>'required|max::500',
            'line' => 'required|max:255',
        ]);
    }else{
        $validator=Validator::make($request->all(),[
            'uuid'=>'required|unique:agents|max:500',
            'line' => 'required|max:255',
        ]);
    }
        if ($validator->fails()) {
           
            Alert::error('Error Title', $validator->errors()->all());
            return back()->withErrors($validator)            
                         ->withInput();
         }
         $agent->update($request->all());
         alert()->html("Agent is update successfully.",'<a href="/agent"  class="btn btn-primary"> Back </a> 
         <a href=""  class="btn btn-primary"> Stay</a>',"success");
         return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agent::find($id)->delete();

        return back()
               ->with('success','Record has been delete successfully');
    }
}

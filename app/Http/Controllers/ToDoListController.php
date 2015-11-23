<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = $this->getLoginUsername();
		Schema::create($username, function (Blueprint $table){
            $table->increments('id');
            $table->string('taskname')->unique();
            $table->string('description');
            $table->date('deadline');
			$table->boolean('important');
            $table->rememberToken();
            $table->timestamps();
        });
		
		return view('auth.profile')->with('username',$username);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item();
		$item->setTable($this->getLoginUsername());
		
		$item->taskname = $request->taskname;
		$item->description = $request->description;
		$item->deadline = $request->deadline;
		$item->important = $request->has('important')?1:0;
		
		$item->save();
		
		return redirect()->refresh();
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
		$info = new Item();
		$info->setTable($this->getLoginUsername());
		//$info->setTable($this->getLoginUsername());
		
		$list = $info->all($this->getLoginUsername(),array('taskname','deadline','description','important'));
		
		
		
        return view('auth.profile')->with(array('username' => $this->getLoginUsername(), 'list' => $list));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	public function getLoginUsername(){
		return Auth::user()->username;
	}
}

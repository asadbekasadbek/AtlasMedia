<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Jobs\PostMessage;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\DateTime;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcomme');
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
    public function store(FileRequest $request)
    {
        $applic=DB::table('applications')->orderByDesc('updated_at')
               ->where('user_id','=',auth()->user()->id)->first();

         if($applic==null){
             $application= new Application();
             $application->user_id=auth()->user()->id;
             $application->topic=$request->topic;
             $application->file= $request->file('file')->store('file','public');
             $application->text=$request->text;
             $application->save();
             return redirect('/dashboard');
         }else{
             $now1=new DateTime();
             $now=new DateTime($applic->updated_at);
             $interval=date_diff($now1,$now)->days;
             if($interval>=1){
                 return  $interval;
             }else{
                 return "Ваша заявка в обработке подождите один день";
             }
         }
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
}

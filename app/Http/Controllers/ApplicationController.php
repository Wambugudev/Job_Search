<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Application;
use App\Job;
use App\User;
use App\Resume;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function destroy($job)
    {
        $job2 = Job::where('id','=', $job)->first();
        $user=auth()->user();
        DB::table('job_user')->where('job_id','=',$job)->where('user_id','=',auth()->id())->delete();
        DB::table('applications')->where('job_id','=',$job)->where('user_id','=',auth()->id())->delete();

        session()->flash('error','Your application has been deleted!');
        return redirect()->route('applied.jobs')->with('user',$user);
    }


    public function applicationCreate($job)
    {
        $resume = Resume::where('user_id', '=', auth()->id())->first();
        if ($resume===null) {
            session()->flash('error','You have to create a resume first for the employer to learn more about you before applying for a job');
            return view('Candidate.resume');
        }else{
            $application = Application::where('user_id', '=', auth()->id())->where('job_id','=',$job)->first();
            if ($application===null) {
                $job2 = Job::where('id','=', $job)->first();
                $user=auth()->user();
                $user->jobs()->attach($job2);
                Application::create([
                    'user_id'=>auth()->id(),
                    'job_id'=>$job2->id,
                ]);
            session()->flash('success','Your application has been sent!');
            return redirect()->route('browse.jobs')->with('jobs',Job::all());

            }else{
                session()->flash('error','You have already applied for this job');
                return redirect()->route('browse.jobs')->with('jobs',Job::all());
            }

        }


    }

    public function deleteApplication($user,$job)
    {
        DB::table('job_user')->where('job_id','=',$job)->where('user_id','=',$user)->delete();
        DB::table('applications')->where('job_id','=',$job)->where('user_id','=',$user)->delete();

        session()->flash('error','Your application has been deleted!');
        return redirect()->route('manage.company');
    }

    public function updateStatus($user,$job)
    {
       DB::table('job_user')->where('job_id','=',$job)->where('user_id','=',$user)->update(['status' => 'accepted']);
       DB::table('applications')->where('job_id','=',$job)->where('user_id','=',$user)->update(['status' => 'accepted']);
       return redirect()->route('manage.company');
    }
}

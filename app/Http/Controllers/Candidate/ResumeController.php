<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Resume;
use App\Job;
use App\User;
use App\Application;
use App\Http\Requests\Candidate\ResumeRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ResumeController extends Controller
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
        $user = Resume::where('user_id', '=', auth()->id())->first();

        if($user===null){
            return view('Candidate.resume');
        }else{
            return view('Candidate.editResume')->with('resume',Resume::where('user_id', '=', auth()->id())->first());

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResumeRequest $request)
    {
        $image = $request->image->store('candidate');

        Resume::create([
            'name'=> $request->name,
            'profession' => $request->profession,
            'about' => $request->about,
            'image' => $image,
            'email' => $request->email,
            'phoneNo' => $request->phoneNo,
            'birthday' => $request->birthday,
            'county' => $request->county,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'insta' => $request->insta,
            'resumeContent' => $request->resumeContent,
            'school' => $request->school,
            'qualification' => $request->qualification,
            'dateFromEd' => $request->dateFromEd,
            'dateToEd' => $request->dateToEd,
            'employer' => $request->employer,
            'position' => $request->position,
            'from' => $request->from,
            'to' => $request->to,
            'skill1' => $request->skill1,
            'skill2' => $request->skill2,
            'skill3' => $request->skill3,
            'user_id' => auth()->id(),
        ]);

            session()->flash('success','Your resume has been created successfuly');

            return view('Candidate.editResume')->with('resume',Resume::where('user_id', '=', auth()->id())->first());
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
    public function update(ResumeRequest $request, Resume $resume)
    {
        $data = $request->only(['name','profession','about', 'email','phoneNo','birthday' ,'county','facebook','twitter','insta' ,
        'resumeContent','school','qualification','dateFromEd','dateToEd','employer','position','from',
        'to','skill1','skill2','skill3']);

        if($request->hasFile('image')){
            $image = $request->image->store('candidate');

            Storage::delete($resume->image);

            $data['image'] = $image;

        }else{

            $resume->update($data);
        }



        session()->flash('success','Your resume has been update successfuly');

        return redirect()->route('resume.create')->with('resume',Resume::where('user_id', '=', auth()->id())->first());
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

    public function browseJobs()
    {
        return view('Candidate.browseJobs')->with('jobs', Job::all());
    }

    public function showJob($job)
    {
        return view('Candidate.showJob')->with('job', Job::find($job));
    }

    public function appliedJobs()
    {
        $user=auth()->user();

        return view('Candidate.appliedJobs')->with('user',$user)->with('applications',Application::all());
    }
}

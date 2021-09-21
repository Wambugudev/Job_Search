<?php

namespace App\Http\Controllers\Employer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Company;
use App\Job;
use App\Resume;
use App\Application;
use App\Http\Requests\Employee\CreateJobRequest;
use App\Http\Requests\Employer\UpdateJobRequest;

class createJobController extends Controller
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
        $company = Company::where('user_id', '=', auth()->id())->first();

        if($company===null){
            session()->flash('error','Before creating a job you have to create a company first');

            return view('Employer.createCompany');
        }else{

            $job = Job::where('user_id', '=', auth()->id())->first();

            if ($job===null) {
                return view('Employer.createJob');
            } else {
                return view('Employer.createJob')->with('jobs',Job::where('user_id', '=', auth()->id())->first());
            }

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateJobRequest $request)
    {
        $image = $request->image->store('employer/Job');

        $company = Company::where('user_id', '=', auth()->id())->first();

        Job::create([
            'user_id'=>auth()->id(),
            'company_id'=>$company->id,
            'title'=>$request->title,
            'type'=>$request->type,
            'description'=>$request->description,
            'location'=>$request->location,
            'image'=>$image,
            'requirements'=>$request->requirements,
        ]);

        session()->flash('success','Your job has been created ');

        return redirect()->route('manage.company')->with('jobs',Job::where('user_id', '=', auth()->id())->first());
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
    public function edit(Job $job)
    {
        return view ('Employer.editJob')->with('job',$job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        $data = $request->all();

        if($request->hasFile('image'))
        {
            $image= $request->image->store('employer/Job');

            Storage::delete($post->image);

            $data['image']=$image;
        }

        $job->update($data);

        session()->flash('success','Your update has been completed successfully');

        return redirect()->route('manage.company')->with('jobs',Job::where('user_id', '=', auth()->id())->get());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();

        session()->flash('error','Your job has been deleted ');

        return redirect()->route('manage.company')->with('jobs',Job::where('user_id', '=', auth()->id())->get());
    }

    // taking user to manage company view
    public function manage()
    {
        $jobs = Job::where('user_id', '=', auth()->id())->get();
        return view('Employer.manageCompany')->with('jobs',$jobs);
    }

    public function browseResume()
    {
        return view('Employer.browseResume')->with('resumes', Resume::all());
    }

    public function showResume($resume)
    {


        return view('Employer.showResume')->with('resume',Resume::find($resume));

    }

    public function showApplication($job)
    {
        $job = Job::find($job);

        return view('Employer.showApplication')->with('job',$job)->with('applications',Application::all());
    }

    public function showResumeApp($userId)
    {
        $resume =DB::table('resumes')->where('user_id','=',$userId)->first();
        return view('Employer.showResume2')->with('resume',$resume);

    }


}

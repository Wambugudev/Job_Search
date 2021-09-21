<?php

namespace App\Http\Controllers\Employer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Http\Requests\Employee\CreateCompanyRequest;
use App\Http\Requests\Employee\UpdateCompanyRequest;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
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
        $user = Company::where('user_id', '=', auth()->id())->first();

        if($user===null){
            return view('Employer.createCompany');
        }else{

            return view('Employer.editCompany')->with('company',Company::where('user_id', '=', auth()->id())->first());

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCompanyRequest $request)
    {
        $image = $request->image->store('employer');

        Company::create([
            'name'=>$request->name,
            'tagline'=>$request->tagline,
            'category'=>$request->category,
            'description'=>$request->description,
            'phone'=>$request->phone,
            'ceo'=>$request->ceo,
            'image'=>$image,
            'website'=>$request->website,
            'email'=>$request->email,
            'employees'=>$request->employees,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'instagram'=>$request->instagram,
            'about'=>$request->about,
            'user_id'=>auth()->id(),
        ]);

        session()->flash('success','The company has been created');

        return view('Employer.editCompany')->with('company',Company::where('user_id', '=', auth()->id())->first());
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $data = $request->only(['name',
        'tagline',
        'category',
        'ceo',
        'image',
        'website',
        'email',
        'employees',
        'facebook',
        'twitter',
        'instagram',
        'about',
        'description',]);

        if($request->hasFile('image')){
            $image = $request->image->store('employer');

            Storage::delete($company->image);

            $data['image'] = $image;

        }

        $company->update($data);

        session()->flash('success','Your resume has been update successfuly');

        return view('Employer.editCompany')->with('company',Company::where('user_id', '=', auth()->id())->first());
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

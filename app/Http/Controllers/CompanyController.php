<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function add(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $website = $request->input('website');

        $employee = new Company();
        $employee->name = $name;
        $employee->email = $email;
        $employee->website = $website;
        $employee->save();  
    }

    public function index()
    {
        $companies = Company::all();
        return view('companies')->with(compact('companies'));
    }

    public function update (Request $request, $id)
    {
        $company = Company::find($id);
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->website = $request->input('website');
        $company->save();
    }

    public function delete (Request $request, $id)
    {
        $company = Company::find($id);
        $company->delete();
    }
}

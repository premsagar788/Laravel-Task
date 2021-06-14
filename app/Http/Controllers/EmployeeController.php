<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function add(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $company_id = $request->input('company_id');
        $email = $request->input('email');
        $phone = $request->input('phone');

        $employee = new Employee();
        $employee->firstname = $firstname;
        $employee->lastname = $lastname;
        $employee->company_id = $company_id;
        $employee->email = $email;
        $employee->phone = $phone;
        $employee->save();  
    }

    public function index()
    {
        $employees = Employee::all();
        $companies = Company::all();
        return view('employees')->with(compact('employees','companies'));
    }

    public function update (Request $request, $id)
    {
        $company = Employee::find($id);
        $company->firstname = $request->input('firstname');
        $company->lastname = $request->input('lastname');
        $company->company_id = $request->input('company');
        $company->email = $request->input('email');
        $company->phone = $request->input('phone');
        $company->save();
    }

    public function delete (Request $request, $id)
    {
        $company = Employee::find($id);
        $company->delete();
    }
}

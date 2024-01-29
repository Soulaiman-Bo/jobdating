<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Exception;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', ['companies' => $companies]);
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $req)
    {
        $data = $req->validate([
            'name' => 'required',
            'description' => 'required',
            'logo' => 'required',
            'sector' => 'nullable',
            'location' => 'nullable'
        ]);

        $company = Company::create($data);

        return redirect()->route('company.index')->with("success", 'Inserted Successfully');
    }

    public function edit(Request $req, $id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'logo' => 'required',
            'sector' => 'nullable',
            'location' => 'nullable'
        ]);
        $company->update($validatedData);

        session()->flash('success', 'Company updated successfully!');

        return redirect()->route('company.index', $company->id);
    }

    public function destroy(Company $company)
    {
        $company->delete();
        session()->flash('success', 'Company deleted successfully!');
        return redirect()->route('company.index');


    }
}

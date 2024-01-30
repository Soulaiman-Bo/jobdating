<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
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

    public function store(StoreCompanyRequest $req)
    {
        if ($req->validated()) {
            $imagePath = $req->file('logo')->store('public/images');  // Store image in 'public/images' directory

            $company = Company::create([
                'name' => $req->input('name'),
                'description' => $req->input('description'),
                'sector' => $req->input('sector'),
                'location' => $req->input('location'),
                'logo' => $imagePath,
            ]);

            return redirect()->route('company.index')->with("success", 'Inserted Successfully');
        } else {
            return redirect()->back()->withInput()->withErrors($req->errors());
        }
    }

    public function edit(Request $req, $id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    public function update(StoreCompanyRequest $request, Company $company)
    {

        if ($request->validated()) {

            $company->update($request->validated());
            session()->flash('success', 'Company updated successfully!');
            return redirect()->route('company.index', $company->id);
        } else {
            return redirect()->back()->withInput()->withErrors($request->errors());
        }
    }


    public function destroy(Company $company)
    {
        $company->delete();
        session()->flash('success', 'Company deleted successfully!');
        return redirect()->route('company.index');
    }
}

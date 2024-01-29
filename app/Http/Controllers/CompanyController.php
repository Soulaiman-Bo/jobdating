<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Exception;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('companies.index');
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
}

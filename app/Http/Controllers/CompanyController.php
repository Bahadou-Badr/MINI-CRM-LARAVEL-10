<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $order = $request->query('order');
        $companies = Company::withCount('users');
        // sort list by name
        switch ($order) {
            case "asc":
                $companies->orderBy('company_name', 'asc');
                break;
            case "desc":
                $companies->orderBy('company_name', 'desc');
                break;
        }
        $companies = $companies->paginate(4)->withQueryString();

        return view('companies.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        $company = new Company;
        $company->company_name = $request->company_name;
        $company->address = $request->address;
        $company->save();

        return redirect()->route('companies.index')->with('status', 'la société a été créée');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);

        return view('companies.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'company_name' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        $company = Company::find($id);
        $company->update($request->all());

        return redirect()->route('companies.index')->with('status', 'la société a été mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $company = Company::withCount('users')->find($id);
        if ($company->users_count) {
            abort(403);
        }
        Company::destroy($id);
        return redirect()->route('companies.index')->with('status', 'la societe a été supprimé');
    }
}

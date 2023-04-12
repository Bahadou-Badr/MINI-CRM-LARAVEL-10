<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string|max:255',
        ]);
        // Get the search value and the search_type(Entreprises/Comanies) from the request
        $search = $request->input('search');
        $search_type = $request->input('search_type');

        // Search in the name column from the Comapnies Or users table
        switch ($search_type) {
            case "Enreprise":
                $results = Company::select(['company_name as name', 'address'])->where('company_name', 'LIKE', "%{$search}%");
                break;
            case "Employe":
                $results = User::where('name', 'LIKE', "%{$search}%");
                break;
            default:
                $results = User::where('name', 'LIKE', "%{$search}%");
        }
        $results = $results->get();

        // Return the search view with resluts
        return view('search.index', ['results' => $results]);
    }
}

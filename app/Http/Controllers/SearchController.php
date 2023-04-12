<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private SearchService $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->middleware('auth');
        $this->middleware('is_admin');

        $this->searchService = $searchService;

    }
    
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string|max:255',
        ]);
        // Get the search value and the search_type(Entreprises/Comanies) from the request
        $search_query = $request->input('search');
        $search_type = $request->input('search_type');

        // Search in the name column from the Comapnies Or users table
        $results = $this->searchService->search($search_type, $search_query);

        // Return the search view with resluts
        return view('search.index', ['results' => $results]);
    }
}

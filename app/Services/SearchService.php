<?php

namespace App\Services;

use App\Models\Company;
use App\Models\User;

class SearchService{

    public function search(string $search_type, string $query){
        switch ($search_type) {
            case "Enreprise":
                $results = Company::select(['company_name as name', 'address'])->where('company_name', 'LIKE', "%{$query}%");
                break;
            case "Employe":
                $results = User::where('name', 'LIKE', "%{$query}%");
                break;
            default:
                $results = User::where('name', 'LIKE', "%{$query}%");
        }
        return $results->get();
    }
}
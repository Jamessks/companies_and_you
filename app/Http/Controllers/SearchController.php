<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Company;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        if (is_null(request('q')) || request('q') == '') {
            return view('pages.results', ['companies' => [], 'justVisit' => true]);
        }

        $searchTerm = request('q');
        // Validate the request input (optional but recommended)
        request()->validate([
            'q' => 'string'
        ]);

        // Query the jobs with a title like the search term
        $companies = Company::where('name', 'like', "%$searchTerm%")->where('status', true)->get();
        // Return or process the results
        return view('pages.results', ['companies' => $companies, 'justVisit' => false]);
    }
}

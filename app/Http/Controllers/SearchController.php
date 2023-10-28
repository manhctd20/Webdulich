<?php
namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query'); 

        $guide = new Guide();
    
        $searchResults = $guide->search($query);

        return view('frontend.search.search_results', compact('searchResults', 'query'));
    }
}
 
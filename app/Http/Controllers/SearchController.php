<?php

namespace App\Http\Controllers;

use App\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    function search(Request $request) {
        $query = $request->query('query');

        if(!$query) {
            $result = Purchase::paginate(10);
        } else {
            $result = Purchase::where('title', 'like', '%'.$query.'%')
            ->paginate(10);

        }

     

        return view("search.search", ['purchases' => $result, 'query' => $query]);
    }
}

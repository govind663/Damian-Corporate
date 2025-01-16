<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\OurServices;
use App\Models\Project;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function services()
    {
        // === Fetch Company Information ===
        $ourServices = OurServices::where('status', 1)->orderBy("id","asc")->whereNull('deleted_at')->get();
        // return($ourServices);

        // === Fetch Projects ===
        $projects = Project::with('category')
                    ->when(request('category'), function ($query) {
                        $query->where('category_id', request('category'));
                    })
                    ->orderBy("id", "ASC")
                    ->where('status', 1)
                    ->whereNull('deleted_at')
                    ->get();


        $categories = Category::orderBy("id","asc")->whereNull('deleted_at')->get();

        return view('frontend.services', [
            'categories' => $categories,
            'projects' => $projects,
            'ourServices' => $ourServices
        ]);
    }
}

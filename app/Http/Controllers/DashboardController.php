<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Package;
use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{


    public function __construct()
    {
        $this->middleware('permission:dashboard-list', ['only' => ['index']]);
    }

    public function index()
    {
        // Counts for various entities
        $usersCount = User::count();
        $servicesCount = Service::count();
        $articlesCount = Article::count();
        $projectsCount = Project::count();
        $packagesCount = Package::count();

        // Counts for package types
        $marketingPackagesCount = Package::where('type', 'marketing')->count();
        $serverPackagesCount = Package::where('type', 'servers')->count();
        $emailPackagesCount = Package::where('type', 'emails')->count();

        // Prepare data for Chart.js
        $chartData = [
            'labels' => ['Marketing', 'Servers', 'Emails'],
            'data' => [
                $marketingPackagesCount,
                $serverPackagesCount,
                $emailPackagesCount
            ],
        ];

        return view('admin.index', compact(
            'usersCount',
            'servicesCount',
            'articlesCount',
            'projectsCount',
            'packagesCount',
            'chartData',
            'marketingPackagesCount',
            'serverPackagesCount',
            'emailPackagesCount',
        ));
    }


    public function setLocale(Request $request)
    {
        $locale = $request->input('locale');
        app()->setLocale($locale);
        session()->put('locale', $locale); // إذا كنت تريد تخزين اللغة في الجلسة
        return redirect()->back();
    }
}

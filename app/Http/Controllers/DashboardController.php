<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function dashboard(Request $request)
    {
        return Inertia::render('Dashboard', [
            'tasks' => $request->user()->tasks,
        ]);
    }
}

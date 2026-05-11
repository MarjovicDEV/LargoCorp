<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        // Query Aimeos tables for statistics, with fallback for testing
        try {
            $productCount = DB::table('mshop_product')->where('status', 1)->count();
        } catch (\Exception $e) {
            $productCount = 0;
        }
        
        try {
            $orderCount = DB::table('mshop_order')->count();
        } catch (\Exception $e) {
            $orderCount = 0;
        }
        
        try {
            $categoryCount = DB::table('mshop_catalog')->where('status', 1)->count();
        } catch (\Exception $e) {
            $categoryCount = 0;
        }

        return view('admin.dashboard', [
            'productCount' => $productCount,
            'orderCount' => $orderCount,
            'categoryCount' => $categoryCount,
            'user' => auth()->user(),
        ]);
    }
}

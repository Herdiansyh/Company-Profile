<?php

namespace App\Http\Controllers;

use App\Models\CompanyStatistic;
use Illuminate\Http\Request;

class CompanyStatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $statistics = CompanyStatistic::orderByDesc('id')->paginate(10);
        return view('admin.statistics.index', compact('statistics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyStatistic $companyStatistic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyStatistic $companyStatistic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyStatistic $companyStatistic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyStatistic $companyStatistic)
    {
        //
    }
}

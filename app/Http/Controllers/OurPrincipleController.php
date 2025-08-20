<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrincipleRequest;
use App\Models\OurPrinciple;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OurPrincipleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        //
        $principles = OurPrinciple::orderByDesc('id')->paginate(10);
        return view('admin.principles.index', compact('principles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.principles.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrincipleRequest $request)
    {
        //
              //closure-based transaction
        DB::transaction(function () use ($request) {
            $validated = $request->validated();
            
            if($request->hasFile('icon')) {
                $iconpath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconpath;
            }
            if($request->hasFile('thumbnail')) {
                $thumbnailpath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailpath;
            }
            $newDataRecord = OurPrinciple::create($validated);

        });

        return redirect()->route('admin.principles.index');
  
    }

    /**
     * Display the specified resource.
     */
    public function show(OurPrinciple $ourPrinciple)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurPrinciple $ourPrinciple)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurPrinciple $ourPrinciple)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurPrinciple $principle)
    {
        //
        DB::transaction(function () use ($principle) {
            $principle->delete();
        });
        return redirect()->route('admin.principles.index');
   
    }
}

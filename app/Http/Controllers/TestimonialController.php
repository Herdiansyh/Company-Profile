<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestimonialRequest;
use App\Models\ProjectClient;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
    {
        //
        $testimonials = Testimonial::orderByDesc('id')->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $clients = ProjectClient::orderByDesc('id')->get();
        return view('admin.testimonials.create', compact('clients'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestimonialRequest $request)
    {
        //
               DB::transaction(function () use ($request) {
            $validated = $request->validated();
            
            if($request->hasFile('thumbnail')) {
                $thumbnailpath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailpath;
            }
          
            $newDataRecord = Testimonial::create($validated);

        });

        return redirect()->route('admin.testimonials.index');
  
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        //
        DB::transaction(function () use ($testimonial) {
            $testimonial->delete();
        });
        return redirect()->route('admin.testimonials.index');
   
    }
}

<?php

namespace App\Http\Controllers;

use App\inquiry;
use App\Rules\phone;
use Illuminate\Http\Request;

class InquiryController extends Controller {
    
    public function __construct()
    {
        $this->middleware('auth')->except('create');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(inquiry $inquiry)
    {
        if (request('search') or request('page'))
        {
            $data = $inquiry->search(request())
                ->paginate(10)
                ->appends([
                    'search' => request()->search
                ]);
            
            return response()->json([
                'data' => view('inquiries.table')->with('inquiries', $data)->render()
            ]);
        }
        
        $data = inquiry::latest()->paginate(10);
        
        return view('inquiries.index')->with('inquiries', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inquiries.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        inquiry::create($request->validate([
            'name'    => 'required|string|min:3|max:255',
            'email'   => 'required|email',
            'phone'   => ['required', 'numeric', 'digits:12', new phone],
            'message' => 'required|string|min:5'
        ]));
        
        return back();
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\inquiry $inquiry
     * @return \Illuminate\Http\Response
     */
    
    public function show(inquiry $inquiry)
    {
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\inquiry $inquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(inquiry $inquiry)
    {
        
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\inquiry             $inquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inquiry $inquiry)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\inquiry $inquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(inquiry $inquiry)
    {
        //
    }
}

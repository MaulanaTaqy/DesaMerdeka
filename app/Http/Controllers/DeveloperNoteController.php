<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;
use App\Models\DeveloperNote;
use Illuminate\Support\Facades\Validator;

class DeveloperNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = DeveloperNote::latest()->first();
        return view('contents.catatan-developer.index', compact('notes'));
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'desc' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', $validator->errors()->first())
                ->withInput();
        } else {
            $notes = DeveloperNote::firstOrNew([]);
            $notes->desc = $request->desc;
            $notes->save();
    
            return redirect()->back()->with('success', 'Success update!');
        }
    }
    
}

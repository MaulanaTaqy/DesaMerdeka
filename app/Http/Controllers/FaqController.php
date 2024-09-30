<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Models\TermCondition;
use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $privacyPolicy = PrivacyPolicy::get()->first();
        $termConditions = TermCondition::get()->first();
        return view('adminpage.content.management-homepage.faq-terms.index', compact('termConditions', 'privacyPolicy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        
        Faq::create([
            'question'          => $request->question,
            'answer'            => $request->answer,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Add New FAQ!',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json([
            'data'  => Faq::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        Faq::find($id)->update([
            'question'          => $request->question,
            'answer'          => $request->answer,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Update FAQ!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faq::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete FAQ!',
        ]);
    }

    public function datatable(Request $request){
        $data = Faq::get();
        
        return DataTables::of($data)->make();
    }

    public function privacyPolicy(Request $request){

        $data = PrivacyPolicy::first();
        PrivacyPolicy::updateOrCreate(
            ['id'    => $data ? $data->id : null],
            [
                'privacy_policies'  =>  $request->privacy_policies,
            ]
        );

        return redirect()->back()->with('success', 'Success update Privacy policy!');
    }

    public function termCondition(Request $request){

        $data = TermCondition::first();
        TermCondition::updateOrCreate(
            ['id'    => $data ? $data->id : null],
            [
                'term_conditions'  =>  $request->term_conditions,
            ]
        );

        return redirect()->back()->with('success', 'Success update Term & Conditions!');
    }
}

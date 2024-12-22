<?php

namespace App\Http\Controllers\Admin;

use App\Models\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TermController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:terms', ['only' => ['index']]);
    }

    public function index()
    {
        $term = Term::first();
        return view('admin.terms.index', compact('term'));
    }


    public function update(Request $request)
    {
        // Validate the input fields
        $request->validate([

            'term1_ar' => 'required|string',
            'term1_en' => 'required|string',
            'term2_ar' => 'required|string',
            'term2_en' => 'required|string',
            'term3_ar' => 'required|string',
            'term3_en' => 'required|string',
            'term4_ar' => 'required|string',
            'term4_en' => 'required|string',
            'term5_ar' => 'required|string',
            'term5_en' => 'required|string',
            'term6_ar' => 'required|string',
            'term6_en' => 'required|string',
            'term7_ar' => 'required|string',
            'term7_en' => 'required|string',
            'term8_ar' => 'required|string',
            'term8_en' => 'required|string',
            'term9_ar' => 'required|string',
            'term9_en' => 'required|string',
            'term10_ar' => 'required|string',
            'term10_en' => 'required|string',

        ]);

        // Find the term by its ID (assuming you're passing the term as an object to the view)
        $term = Term::first();

        $term->translate('ar')->term1 = $request->term1_ar;
        $term->translate('ar')->term2 = $request->term2_ar;
        $term->translate('ar')->term3 = $request->term3_ar;
        $term->translate('ar')->term4 = $request->term4_ar;
        $term->translate('ar')->term5 = $request->term5_ar;
        $term->translate('ar')->term6 = $request->term6_ar;
        $term->translate('ar')->term7 = $request->term7_ar;
        $term->translate('ar')->term8 = $request->term8_ar;
        $term->translate('ar')->term9 = $request->term9_ar;
        $term->translate('ar')->term10 = $request->term10_ar;

        $term->translate('en')->term1 = $request->term1_en;
        $term->translate('en')->term2 = $request->term2_en;
        $term->translate('en')->term3 = $request->term3_en;
        $term->translate('en')->term4 = $request->term4_en;
        $term->translate('en')->term5 = $request->term5_en;
        $term->translate('en')->term6 = $request->term6_en;
        $term->translate('en')->term7 = $request->term7_en;
        $term->translate('en')->term8 = $request->term8_en;
        $term->translate('en')->term9 = $request->term9_en;
        $term->translate('en')->term10 = $request->term10_en;

        // Save the terms
        $term->save();

        // Redirect back with a success message
        return redirect()->route('terms.index', ['term' => $term->id])->with('success', __('translations.terms-updated'));
    }
}

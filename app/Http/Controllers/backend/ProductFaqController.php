<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\ProductFaqRequest;
use App\Models\ProductFaq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productfaqs = ProductFaq::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.product.productfaq.index', [
            'productfaqs' => $productfaqs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.product.productfaq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductFaqRequest $request)
    {
        $request->validated();

        try {

            $productfaq = new ProductFaq();

            $productfaq->title = $request->title ?? null;
            $productfaq->description = $request->description ?? null;

            $productfaq->inserted_at = Carbon::now();
            $productfaq->inserted_by = Auth::user()->id;
            $productfaq->save();

            return redirect()->route('product-faq.index')->with('message','FAQ has been successfully created.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $productfaq = ProductFaq::find($id);

        return view('backend.product.productfaq.edit', [
            'productfaq' => $productfaq
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductFaqRequest $request, string $id)
    {
        $request->validated();

        try {

            $productfaq = ProductFaq::find($id);

            $productfaq->title = $request->title ?? null;
            $productfaq->description = $request->description ?? null;
            $productfaq->modified_at = Carbon::now();
            $productfaq->modified_by = Auth::user()->id;
            $productfaq->save();

            return redirect()->route('product-faq.index')->with('message','FAQ has been successfully updated.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();

        try {

            $productfaq = ProductFaq::findOrFail($id);
            $productfaq->update($data);

            return redirect()->route('product-faq.index')->with('message','FAQ has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());

        }
    }
}

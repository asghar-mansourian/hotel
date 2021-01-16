<?php

namespace App\Http\Controllers\Admin;

use App\CustomerReviews;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Member\ImageController;
use App\Http\Requests\Admin\CustomerReviewsRequest;
use App\Http\Requests\Admin\CustomerReviewsUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\lib\Customer as CustomerHelper;

class CustomerReviewController extends Controller
{
    use ValidatorRequest;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerReviews = CustomerReviews::paginate(CustomerReviews::paginateNumber);
        return view('admin.customer_reviews.index',compact('customerReviews'),with([
            'sortField' => CustomerReviews::sortField,
            'sortType' => CustomerReviews::sortType
        ]));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer_reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customerReviewValidate = new CustomerReviewsRequest();
        $validate = $this->validateRules($customerReviewValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($customerReviewValidate->rules(), $request);
        $customerReviews = new CustomerReviews();
        $file_name = CustomerHelper::uploadImage($request->file('picture'));
        $customerReviews->name = $request->name;
        $customerReviews->description = $request->description;
        $customerReviews->description_ru = $request->description_ru;
        $customerReviews->save();
        //save image address by morph relation
        $image = new ImageController();
        $image->store($file_name,$customerReviews);
        request()->session()->flash('message', __('admin.customer_review_create_successful'));
        request()->session()->flash('success', 1);
        return response()->json([], 200);
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
        $customerReview = CustomerReviews::findOrFail($id);
        return view('admin.customer_reviews.edit',compact('customerReview'));
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
        $customerReviewValidate = new CustomerReviewsUpdateRequest();
        $validate = $this->validateRules($customerReviewValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($customerReviewValidate->rules(), $request);
        $customerReview = CustomerReviews::findorfail($id);
        if($request->hasFile('picture'))
        {
            CustomerHelper::deleteImage($customerReview);
            $file_name = CustomerHelper::uploadImage($request->file('picture'));
            $image = new ImageController();
            $image->store($file_name,$customerReview);
            $customerReview->update([
                'name' => $request->name,
                'description' => $request->description,
                'description_ru' => $request->description_ru,
            ]);
            session()->flash('message', __('admin.general.message.customer_update_successful'));
            session()->flash('success', 1);
            return response()->json([], 200);
        }
        $customerReview->update([
            'name' => $request->name,
            'description' => $request->description,
            'description_ru' => $request->description_ru,
        ]);
        session()->flash('message', __('admin.general.message.customer_update_successful'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customerReview = CustomerReviews::findorfail($id);
        CustomerHelper::deleteImage($customerReview);
        $customerReview->delete();
        session()->flash('message', __('admin.customer_review_delete_successful'));
        session()->flash('success', 1);
        return redirect('admin/customer_reviews/');

    }

    public function search(Request  $request)
    {
        $search = $request->search;
        $customerReviews = CustomerReviews::where('name', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%')->orWhere('description_ru', 'like', '%' . $search . '%')->paginate(CustomerReviews::paginateNumber);
        return view('admin.customer_reviews.index',compact('customerReviews'),with([
            'sortField' => CustomerReviews::sortField,
            'sortType' => CustomerReviews::sortType
        ]));
    }
}

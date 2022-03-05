<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function getOffers()
    {
        return Offer::select('id', 'name')->get();
    }
//    public function store(){
//        Offer::create([
//            'name'=>'offer2',
//            'price'=>'5000',
//            'details'=>'offer details',
//
//
//        ]);
//    }
    public function create()
    {
        return view('offers.create');
    }

    public function store(Request $request)
    {
        //validate data before insert to database
        //code validate
        /*
         * first array:for the request
         * 2nd array :validation rule
         * 3rd array:message show if an error
         * */

        $rules = $this->getRules();
        $messages = $this->getMessages();

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        //insert
        Offer::create([
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details,
        ]);
        return '<h1 class="container">save successfully</h1>';
    }

    protected function getRules(): array
    {
        return $rules = [
            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric',
            'details' => 'required',
        ];
    }

    protected function getMessages(): array
    {
        return $messages = [
            'name.required' => trans('messages.offer name required',),
            'name.unique' => __('messages.offerNameUnique'),
            'price.required' => __('messages.offerPriceRequired'),
            'price.numeric' => __('messages.offerPriceNumeric'),
            'details.required' => __('messages.offerDetailsRequired'),
        ];
    }

}

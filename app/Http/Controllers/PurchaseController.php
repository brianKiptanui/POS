<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseRequest;
use App\Http\Resources\PurchaseResource;
use App\Models\Product;
use App\Models\Purchase;
use Symfony\Component\HttpFoundation\Response;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PurchaseResource::collection(Purchase::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseRequest $request)
    {
        $purchase = Purchase::create($request->all());

        $data = $request->all();


        $dat = $data['product_id'];
        $qty = $request->get('quantity');

        //attach sale with there products and quantities
        $attach_data = [];

        for ($i = 0; $i < count(array($dat)); $i++) {
            $attach_data[$dat[$i]] = ['quantity' => $qty[$i]];
        }

        $purchase->products()->attach($attach_data);


        //check products units and add quntities that is purchased

        for ($i = 0; $i < count(array($dat)); $i++) {
            $product = Product::find($dat[$i]);
            $product->units = $product->units + ($qty[$i]);
            $product->save();
        }

        return response()->json([
            'data'=> $purchase
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        return new PurchaseResource($purchase);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PurchaseRequest $request, Purchase $purchase)
    {
        foreach ($purchase->products as $key => $product) {
            $product->update([
                'units' => $product->units - $product->pivot->quantity
            ]);
        }
        $purchase->delete();

        $purchase->update($request->all());

        $data = $request->all();


        $dat = $data['product_id'];
        $qty = $request->get('quantity');

        //attach sale with there products and quantities
        $attach_data = [];

        for ($i = 0; $i < count(array($dat)); $i++) {
            $attach_data[$dat[$i]] = ['quantity' => $qty[$i]];
        }

        $purchase->products()->attach($attach_data);


        //check products units and add quntities that is purchased

        for ($i = 0; $i < count(array($dat)); $i++) {
            $product = Product::find($dat[$i]);
            $product->units = $product->units + ($qty[$i]);
            $product->save();
        }

        return response()->json([
            'success'=> true,
            'data'=> 'Category details updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchase = Purchase::find($purchase);
        Purchase::destroy($purchase);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

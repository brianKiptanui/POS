<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Http\Resources\SaleResource;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return SaleResource::collection(Sale::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleRequest $request)
    {
        //
        $sale = Sale::create($request->all());

        $data = $request->all();


        $dat = $data['product_id'];
        $qty = $request->get('quantity');

        //attach sale with there products and quantities
        $attach_data = [];

        for ($i = 0; $i < count(array($dat)); $i++) {
            $attach_data[$dat[$i]] = ['quantity' => $qty[$i]];
        }

        $sale->products()->attach($attach_data);

        //check products stock and substract quntities that is sale
        for ($i = 0; $i < count(array($dat)); $i++) {
            $product = Product::find($dat[$i]);
            if ($product->units == 0) {
                return response()->json([
                    'data'=> 'this product stock is empty'
                ]);
            } else {
                $product->units = $product->units - ($qty[$i]);
                $product->save();
            }

            return response()->json([
                'data'=> $sale
            ]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
        return new SaleResource($sale);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaleRequest $request, Sale $sale)
    {
        foreach ($sale->products as $key => $product) {
            $product->update([
                'units' => $product->units + $product->pivot->quantity
            ]);
        }
        $sale->delete();

        $sale->update($request->all());

        $data = $request->all();


        $dat = $data['product_id'];
        $qty = $request->get('quantity');

        //attach sale with there products and quantities
        $attach_data = [];

        for ($i = 0; $i < count(array($dat)); $i++) {
            $attach_data[$dat[$i]] = ['quantity' => $qty[$i]];
        }

        $sale->products()->attach($attach_data);

        //check products stock and substract quntities that is sale
        for ($i = 0; $i < count(array($dat)); $i++) {
            $product = Product::find($dat[$i]);
            if ($product->units == 0) {
                return response()->json([
                    'data'=> 'this product stock is empty'
                ]);
            } else {
                $product->units = $product->units - ($qty[$i]);
                $product->save();
            }

            return response()->json([
                'data'=> $sale
            ]);
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
    public function destroy(Sale $sale)
    {
        //
        $sale = Sale::find($sale);
        Sale::destroy($sale);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

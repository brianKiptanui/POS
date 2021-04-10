<?php

namespace App\Http\Controllers;

use App\Http\Requests\PreturnRequest;
use App\Http\Resources\PreturnResource;
use App\Models\Preturn;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PreturnResource::collection(Preturn::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PreturnRequest $request)
    {
        return Preturn::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Preturn $preturn)
    {
        return new PreturnResource($preturn);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preturn $preturn)
    {
        $preturn->update($request->all());

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
    public function destroy(Preturn $preturn)
    {
        $preturn = Preturn::find($preturn);
        Preturn::destroy($preturn);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

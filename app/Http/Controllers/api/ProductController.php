<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($barcode)
    {
        $user = auth()->user();

        if ($user->role == 'admin' || $user->role == 'employee') {
            $data = Products::where('barcode', $barcode)->first();
            if ($data != null) {
                $response = new Response();
                $response->setStatusCode(200);
                $response->setContent($data);
            } else {
                $response = new Response();
                $response->setStatusCode(404);
                //response()->json(['message' => 'Product not found'], 404);
            }

            return $response;
        } else {
            $response = new Response();
            $response->setStatusCode(403);

            return $response;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

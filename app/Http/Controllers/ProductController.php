<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\Products;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ProductController extends Controller
{
    public function index()
    {

        $products = Products::latest()->paginate(10);

        return view('admin.Product.products', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function indexHome(Request $request)
    {

        try {

            $data = $request->all();
            if ($request->has('categories')) {

                if (request()->categories == '1') {
                    $products = Products::latest()->where('status', 'published')->paginate(5);
                    $categories = categorie::orderBy('id', 'asc')->get();
                } else {

                    $products = categorie::where('id', request()->categories)->first()->products()->where('status', 'published')->paginate(5);
                    $categories = categorie::orderBy('id', 'asc')->get();
                }
            } else {
                $products = Products::latest()->paginate(5);
                $categories = categorie::orderBy('id', 'asc')->get();
            }

            //  dd($products);
            return view('index', ['products' => $products, 'categories' => $categories, 'data' => $data]);
        } catch (QueryException $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),

            ]);

            return redirect('/503');
        } catch (ModelNotFoundException $e) {

            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),
            ]);

            return redirect('/500');
        } catch (HttpException $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),
            ]);

            return redirect('/503');
        } catch (\Exception $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),
            ]);

            return redirect('/500');
        }

        // catch(\Exception $e){
        //     dd($e->getCode());
        //  //   dd(get_class($e));
        //     //dd($e->getMessage());
        //     //return redirect()->route('index')->with('error', 'Something went wrong!');
        // }

    }

    public function productPageWithFilters(Request $request)
    {
        try {

            $data = $request->all();
            $products = Products::query();

            if ($request->has('categories')) {
                $categoryId = $request->input('categories');

                if ($categoryId != 1 && $categoryId != null) {
                    $products->where('categorie_id', $categoryId);
                }
            }

            if ($request->has('price_range')) {
                $priceRange = $request->input('price_range');
                if ($priceRange == '0-25') {
                    $products->where('selling_price', '<=', 25.00)->get();
                } elseif ($priceRange == '25-50') {
                    $products->whereBetween('selling_price', [25.00, 50.00])->get();
                } elseif ($priceRange == '50-100') {
                    $products->whereBetween('selling_price', [50.00, 100.00])->get();
                } elseif ($priceRange == '100+') {
                    $products->where('selling_price', '>=', 100.00)->get();
                }
            }
            $categories = categorie::orderBy('id', 'asc')->get();
            $products = $products->where('status', 'published')->latest()->paginate(10);

            return view('products', ['products' => $products, 'categories' => $categories, 'data' => $data]);

        } catch (QueryException $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),

            ]);

            return redirect('/503');
        } catch (ModelNotFoundException $e) {

            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),
            ]);

            return redirect('/500');
        } catch (HttpException $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),
            ]);

            return redirect('/503');
        } catch (\Exception $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),
            ]);

            return redirect('/500');
        }

        // catch(\Exception $e){
        //     dd($e->getCode());
        //  //   dd(get_class($e));
        //     //dd($e->getMessage());
        //     //return redirect()->route('index')->with('error', 'Something went wrong!');
        // }

    }

    public function productPage(Request $request)
    {
        // $category_id = 1;
        // $min_price = 10;
        // $max_price = 100;
        // $sort_order = 'asc';
        // $products = DB::table('products')
        //     ->where('category_id', $category_id)
        //     ->whereBetween('price', [$min_price, $max_price])
        //     ->orderBy('price', $sort_order)
        //     ->get();
        try {
            if (request()->categories) {

                if (request()->categories == 'all') {
                    $products = Products::latest()->paginate(10);
                    $categories = categorie::all();
                } else {
                    $products = categorie::where('id', request()->categories)->first()->products()->paginate(5);
                    $categories = categorie::all();
                }
            } else {
                $products = Products::latest()->paginate(10);
                $categories = categorie::all();
            }

            return view('products', compact('products'), compact('categories'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
        } catch (QueryException $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),

            ]);

            return redirect('/503');
        } catch (ModelNotFoundException $e) {

            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),
            ]);

            return redirect('/500');
        } catch (HttpException $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),
            ]);

            return redirect('/503');
        } catch (\Exception $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),
            ]);

            return redirect('/500');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        try {
            $faker = \Faker\Factory::create();

            function ProductEan8bum()
            {
                // $ean8 = preg_replace('/\D/', '', $ean8);

                $prefix = '87';

                $ean8 = $prefix.mt_rand(10000, 99999);

                $digits = str_split($ean8);

                $odd = 0;
                $even = 0;
                $sum = 0;

                for ($i = count($digits) - 1; $i >= 0; $i--) {

                    if ($i % 2 == 0) {
                        $odd += $digits[$i];
                    } else {
                        $even += $digits[$i];
                    }

                }
                $sum = $odd * 3 + $even * 1;
                $checksum = $ean8.(10 - ($sum % 10)) % 10;

                return $checksum;
            }
            // for ($i = 2; $i = 1; $i++) {
            //     $barcode = '867' . $faker->randomNumber(4);
            //     $validator = Validator::make(['barcode' => $barcode], [
            //         'barcode' => 'required|numeric|digits:7 | unique:products',
            //     ]);

            //     if ($validator->fails()) {

            //         Log::channel('errors')->error('lsjdg', [
            //             'class' => $i,
            //             'te' => $barcode,
            //             'sljne'=> $validator->errors(),
            //         ]);

            //     } else {
            //         Log::channel('errors')->error('adasd', [
            //             'class' => $i,
            //             'te' => $barcode,
            //         ]);
            //         $i = 0;

            //     }
            //     // if ($validator->fails()) {
            //     //     $barcode = '867' . $faker->randomNumber(4);
            //     // }
            // }
            // $barcode ='867'.$faker->randomNumber(4);
            // $validator = Validator::make(['barcode' => $barcode], [
            //     'barcode' => 'required|numeric|digits:8 | unique:products',
            // ]);
            // if ($validator->fails()) {
            //     $barcode ='867'.$faker->randomNumber(4);
            // }

            $barcode = ProductEan8bum();
            $categories = categorie::Where('id', '!=', 1)->get();

            return view('admin.Product.create', compact('categories'), compact('barcode'));
        } catch (QueryException $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'class' => get_class($e),

            ]);

            return redirect('/503');
        } catch (ModelNotFoundException $e) {

            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'class' => get_class($e),
            ]);

            return redirect('/500');
        } catch (HttpException $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'class' => get_class($e),
            ]);

            return redirect('/503');
        } catch (\Exception $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'class' => get_class($e),
                'te' => $barcode,
            ]);

            return redirect('/500');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'barcode' => 'required|numeric|digits:7 | unique:products',
                'stock' => 'required|numeric',
                'categorie_id' => 'required',
                'height_cm' => 'required|numeric',
                'width_cm' => 'required|numeric',
                'depth_cm' => 'required|numeric',
                'weight_gr' => 'required|numeric',
                'status' => 'required',
                'discount_percentage' => 'required|numeric',
                'purchase_price' => 'required|numeric',
                'selling_price' => 'required|numeric',

            ]);

            $input = $request->all();

            if ($image = $request->file('image')) {
                $fileName = $request->file('image')->getClientOriginalName();
                $path = $request->file('image')->storeAs('images', $fileName, 'public');
                $input['image'] = '/storage/'.$path;
            }

            Products::create($input);

            return redirect()->route('index')
                ->with('success', 'Product created successfully.');
        } catch (QueryException $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),

            ]);

            return redirect('/503');
        } catch (ModelNotFoundException $e) {

            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),
            ]);

            return redirect('/500');
        } catch (HttpException $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),
            ]);

            return redirect('/503');
        } catch (\Exception $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),
            ]);

            return redirect('/500');
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {

        return view('admin.Product.show', compact('product'));
    }

    public function showProduct($id)
    {
        $pro = Products::find($id);
        $products = Products::where('categorie_id', $pro->categorie_id)->paginate(4);

        return view('product', compact('pro'), compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        $categories = categorie::Where('id', '!=', 1)->get();

        return view('admin.Product.edit', compact('product'), compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'barcode' => 'required|numeric|unique:products,barcode,'.$product->id.',id| digits:8',
                'stock' => 'required|numeric',
                'categorie_id' => 'required',
                'height_cm' => 'required|numeric',
                'width_cm' => 'required|numeric',
                'depth_cm' => 'required|numeric',
                'weight_gr' => 'required|numeric',
                'status' => 'required',
                'discount_percentage' => 'required|numeric',
                'selling_price' => 'required|numeric',
                'purchase_price' => 'required|numeric',
            ]);

            $input = $request->all();

            if ($image = $request->file('image')) {
                $fileName = $request->file('image')->getClientOriginalName();
                $path = $request->file('image')->storeAs('images', $fileName, 'public');
                $input['image'] = '/storage/'.$path;
            } else {
                unset($input['image']);
            }

            $product->update($input);

            return redirect()->route('index')
                ->with('success', 'Product succesvol gupdatet');
        } catch (QueryException $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),

            ]);

            return redirect('/503');
        } catch (ModelNotFoundException $e) {

            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),
            ]);

            return redirect('/500');
        } catch (HttpException $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),
            ]);

            return redirect('/503');
        } catch (\Exception $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),
            ]);

            return redirect('/500');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        try {
            $product->delete();

            return redirect()->route('index')
                ->with('success', 'Product succesvol verwijderd');
        } catch (QueryException $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'class' => get_class($e),

            ]);

            return redirect('/503');
        } catch (ModelNotFoundException $e) {

            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'class' => get_class($e),
            ]);

            return redirect('/500');
        } catch (HttpException $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'class' => get_class($e),
            ]);

            return redirect('/503');
        } catch (\Exception $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'class' => get_class($e),
            ]);

            return redirect('/500');
        }
    }
}

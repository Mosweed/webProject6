<?php

namespace App\Http\Controllers;

use App\Charts\MonthlySales;
use App\Charts\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

    public function admin()
    {
        $salesData = [
            'Januari' => 200,
            'Februari' => 400,
            'March' => 600,
            'April' => 800,
            'May' => 1000,
            'June' => 1200,
        ];
        $trafficData = [
            'Januari' => 1000,
            'Februari' => 1200,
            'Maart' => 800,
            'April' => 900,
            'Mei' => 1100,
            'Juni' => 1300,
        ];

        $saleTrafficChart = new MonthlySales;
        $saleTrafficChart->labels(array_keys($salesData)); // Use the keys of the $salesData array as chart labels
        $saleTrafficChart->dataset('Monthly sales 2022', 'line', array_values($salesData)); // Use the values of the $salesData array as the chart dataset
        $saleTrafficChart->dataset('Website traffic', 'line', array_values($trafficData)); // Add another dataset for website traffic

        $products = [
            ['name' => 'Product A', 'category' => 'Category 1', 'sales' => 100],
            ['name' => 'Product B', 'category' => 'Category 1', 'sales' => 200],
            ['name' => 'Product C', 'category' => 'Category 2', 'sales' => 300],
            ['name' => 'Product D', 'category' => 'Category 3', 'sales' => 150],
            ['name' => 'Product E', 'category' => 'Category 3', 'sales' => 250],
        ];

        // Group products by category
        $categorySalesData = [];
        $categoryLabels = [];
        foreach ($products as $product) {
            $category = $product['category'];
            $sales = $product['sales'];
            if (isset($categorySalesData[$category])) {
                $categorySalesData[$category] += $sales;
            } else {
                $categorySalesData[$category] = $sales;
                $categoryLabels[] = $category;
            }
        }

        // Create the chart
        $productChart = new Product;
        $productChart->labels($categoryLabels);
        $productChart->dataset('Product Sales per Category', 'pie', array_values($categorySalesData))->backgroundColor(['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF']);

        return view('admin.dashboard', [
            'charts' => [
                'chart1' => $saleTrafficChart,
                'chart2' => $productChart,
            ],
        ]);
    }
}

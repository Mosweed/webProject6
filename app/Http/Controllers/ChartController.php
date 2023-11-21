<?php

namespace App\Http\Controllers;

use App\Charts\Product;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function sales_per_register()
    {
        $results = DB::table('orders')
            ->select('drawer_id', DB::raw('SUM(total) as sales'))
            ->groupBy('drawer_id')
            ->orderBy('drawer_id')
            ->get();

        // dd($results);

        /* per drawer */
        $sales_per_drawer = [];

        foreach ($results as $result) {
            $sales = $result->sales;
            $drawer_id = $result->drawer_id;
            if ($drawer_id == 0 || $drawer_id == '0') {
                $drawer_name = 'Webshop';
            } else {
                $drawer_name = 'Kassa '.$drawer_id;
            }

            /* Group sales per drawer*/
            if (isset($sales_per_drawer[$drawer_name])) {
                $sales_per_drawer[$drawer_name] += $sales;
            } else {
                $sales_per_drawer[$drawer_name] = $sales;
            }
        }

        // dd($sales_per_drawer);

        /* Create the sales per category chart. */
        $salesPerDrawerChart = new Product;
        $salesPerDrawerChart->labels(array_keys($sales_per_drawer));
        $salesPerDrawerChart->dataset('Verkoop per Kassa/webshop', 'bar', array_values($sales_per_drawer))
            ->backgroundColor([
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)',
            ])->color([
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)',
            ]);

        return view('admin.registerSales', [
            'chart' => $salesPerDrawerChart,
        ]);
    }

    public function general_sales()
    {
        /* Query getting needed order sale information. */
        $results = DB::table('orders')
            ->select(DB::raw('DATE_FORMAT(date, "%Y-%m-%d") as day, DATE_FORMAT(date, "%Y-%m") as month, DATE_FORMAT(date, "%Y") as year, SUM(total) as sales'))
            ->groupBy('day', 'month', 'year')
            ->get();

        // dd($results);
        $sales_by_day = [];
        $sales_by_month = [];
        $sales_by_year = [];

        foreach ($results as $result) {
            $day = $result->day;
            $month = $result->month;
            $year = $result->year;
            $sales = $result->sales;

            /* Group sales by day*/
            if (isset($sales_by_day[$day])) {
                $sales_by_day[$day] += $sales;
            } else {
                $sales_by_day[$day] = $sales;
            }

            /* Group sales by month*/
            if (isset($sales_by_month[$month])) {
                $sales_by_month[$month] += $sales;
            } else {
                $sales_by_month[$month] = $sales;
            }

            /* Group sales by year*/
            if (isset($sales_by_year[$year])) {
                $sales_by_year[$year] += $sales;
            } else {
                $sales_by_year[$year] = $sales;
            }
        }
        // dd($sales_by_day, $sales_by_month, $sales_by_year);

        // Create chart data
        $chart_data = [
            'sales_by_day' => [
                'labels' => array_keys($sales_by_day),
                'data' => array_values($sales_by_day),
            ],
            'sales_by_month' => [
                'labels' => array_keys($sales_by_month),
                'data' => array_values($sales_by_month),
            ],
            'sales_by_year' => [
                'labels' => array_keys($sales_by_year),
                'data' => array_values($sales_by_year),
            ],
        ];

        return view('admin.generalSales', [
            'chart_data' => [$chart_data],
        ]);
    }

    public function product_sales()
    {

        /* Query getting needed product sale information. */
        $results = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('categories', 'products.categorie_id', '=', 'categories.id')
            ->select('order_items.product_id', 'products.name as name', 'categories.name as category', 'order_items.quantity as sales')
            ->get();
        // dd($results);
        foreach ($results as $result) {
            $products[] = [
                'name' => $result->name,
                'category' => $result->category,
                'sales' => $result->sales,
            ];
        }
        /* Group products by category. */
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

        /* Group sales per product. */
        $product_sales_data = [];
        $product_labels = [];
        foreach ($products as $product) {
            $name = $product['name'];
            $sales = $product['sales'];
            if (isset($product_sales_data[$name])) {
                $product_sales_data[$name] += $sales;
            } else {
                $product_sales_data[$name] = $sales;
                $product_labels[] = $name;
            }
        }

        /* Create the sales per category chart. */
        $salesPerCatChart = new Product;
        $salesPerCatChart->labels($categoryLabels);
        $salesPerCatChart->dataset('Product verkoop per Categorie', 'bar', array_values($categorySalesData))
            ->backgroundColor([
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)',
            ])->color([
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)',
            ]);

        /* Create the sales per product chart. */
        $salesPerProductChart = new Product;
        $salesPerProductChart->labels($product_labels);
        $salesPerProductChart->minimalist('false');
        $salesPerProductChart->dataset('Verkoop per product', 'bar', array_values($product_sales_data))
            ->backgroundColor([
                'rgba(255, 200, 42, 0.2)',
                'rgba(25, 19, 164, 0.2)',
                'rgba(25, 255, 16, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)',
            ])->color([
                'rgb(255, 200, 42)',
                'rgb(25, 19, 164)',
                'rgb(25, 255, 16)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)',
            ]);

        /* Pass charts to view. */
        return view('admin.salesChart', [
            'charts' => [
                'chart1' => $salesPerProductChart,
                'chart2' => $salesPerCatChart,
            ],
        ]);
    }
}

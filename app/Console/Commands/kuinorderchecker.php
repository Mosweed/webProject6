<?php

namespace App\Console\Commands;

use App\Models\myorders;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class kuinorderchecker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kuin:orderchecker';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $myorder = myorders::query();
        $myorder->where('status', 'Wachten');
        $myorder->where('Order_status', 'pending');
        $myorder->orWhere('Order_status', 'processing');
        $myorder = $myorder->get();

        foreach ($myorder as $order) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer 44|srnnu8Lvo78eg3ZEdPj5fa14gp6XtKZEfbcmlZ3U',
            ])->get(
                'https://kuin.summaict.nl/api/order/'.$order->Order_id
            );

            $order->Order_status = $response['status'];
            $order->save();

        }
    }
}

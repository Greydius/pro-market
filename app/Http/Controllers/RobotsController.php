<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MadWeb\Robots\Robots;
use App\Order;
use App\FixingOrder;

class RobotsController extends Controller
{
    /**
     * Generate robots.txt
     */
    public function __invoke(Robots $robots)
    {
        $robots->addUserAgent('*');

        if ($robots->shouldIndex()) {
            // If on the live server, serve a nice, welcoming robots.txt.
            $robots->addDisallow('/admin');
            $robots->addSitemap('sitemap.xml');
        } else {
            // If you're on any other server, tell everyone to go away.
            $robots->addDisallow('/');
        }

        return response($robots->generate(), 200, ['Content-Type' => 'text/plain']);
    }


    public function testMail()
    {
        $order = Order::where('id',57)->with('products')->first();
        $request_details = FixingOrder::where('id',6)->with('products')->first();
        // dd();
        $request_details['clientOrder'] = $request_details->products;
        // dd($order);
        // $order['clientOrder'] = $order->products;
        return view('emails.product-order-to-client',compact('request_details','order'));
    }
}

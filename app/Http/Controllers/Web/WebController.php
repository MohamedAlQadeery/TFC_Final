<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function index()
    {
        $foods = Food::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        //    $sliders = Slider::all();

        return view('web.home', compact('foods', 'categories'));
    }

    function sendOrder(Request $request)
    {
        // dd($request->all());
        // $attributes = Attribute::whereIn('id', $request->foodAddtionsId)->get();
        // $food = Food::whereIn('id', $request->foodId)->get();

        $order = [];
        $total = 0;
        $orderData = [];
        
        foreach ($request->foodId as $key => $food) {

            if (app()->getLocale() == "ar") {
                $orderTotal = "السعر الإجمالي : ";
                $delPrice = "السعر التوصيل : ";
                $quantity = "الكمية : ";
                $price = "السعر : ";
            } elseif (app()->getLocale() == "en") {
                $orderTotal = "orderTotal : ";
                $delPrice = "delPrice : ";
                $quantity = "quantity : ";
                $price = "price : ";
            } else {
                $orderTotal = "السعر الإجمالي : ";
                $delPrice = "السعر التوصيل : ";
                $quantity = "الكمية : ";
                $price = "السعر : ";
            }

            $foodAddtionsId = explode(",", $request->foodAddtionsId[$key]);

            $additions = Attribute::whereIn('id', $foodAddtionsId)->get();
            $food = Food::where('id', $food)->first();

            $order[$key] = $food->lang_name . " ";

            // for the food order data 
            $orderData[$key]["food_id"]=$food->id;
            $orderData[$key]["food_qty"]=$request->foodQty[$key];
            $orderData[$key]["food_price"]=$request->foodPrice[$key];

            if (count($additions) > 0) {
                $orderData[$key]["food_attr"]=json_encode($request->foodAddtionsId[$key]);

                foreach ($additions as $addition) {
                    $order[$key] .= "+" . $addition->lang_name;

                    // $orderData[$key]["food_attr"]=$addition->lang_name ."(".$addition->price."TL)";
                }
            }else{
                $orderData[$key]["food_attr"]=null;
                
            }



            $order[$key] .= "*" . $request->foodQty[$key] . " = " . $request->foodPrice[$key] . " TL%0a%0a ";
            $order[$key] .= $quantity . $request->foodQty[$key] . "%0a%0a ";
            $order[$key] .= $price . $request->foodPrice[$key] . "TL%0a%0a ";

            $total += $request->foodPrice[$key];
        }

        $delCost = setting('delivery_price') > 0 ?setting('delivery_price')  :0 ;
        $order[count($order)] = $orderTotal . $total . "TL%0a%0a ";
        $order[count($order) + 1] = $delPrice . $delCost . "TL%0a%0a ";

        $order = implode(" ", $order);

        // store in the order table
        $stored_order = Order::create([
            'delivery_price'=>$delCost,
            'total'=>$total,
        ]);


        foreach($orderData as $data ){
            // dd($data["food_attr"]);
            $food_orders = DB::table('food_orders')->insert([
                'food_id'=>$data["food_id"],
                'order_id'=>$stored_order->id,
                'price'=>$data["food_price"],
                'quantity'=>$data["food_qty"],
                'attributes'=>$data["food_attr"],
                'created_at'=>$stored_order->created_at
            ]);
        }


        return Redirect('https://api.whatsapp.com/send?phone=905466497805&text=' . $order . '&source=&data=');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;

use Cart;

use Stripe;

use App\Order;

use Auth;


class ProductController extends Controller
{
    public function getIndex()
    {
    	$products = Product::all();
    	return view('shop.index', compact('products'));
    }


    public function getAddToCart(Request $request, $id)
    {
    	$product = Product::find($id);
    	//echo '<pre>';
    	//print_r($product->toArray());die;

    	if (count($product)) {
    		$items = [
    			'id' => $product->id,
    			'name' => $product->title,
    			'price' => $product->price,
    			'sku'   => 1,
    			'slug'  => null,
    			'image' => null,
    			'description' => null,
    			'quantity' => 1,
    			'tax'      => 0,
    			'discount'  => 0,
    		];

    		Cart::insert($items);
    	}

    	flash()->success('Added', 'Product added successfully cart..!!');
    	return redirect()->route('product.index');
    }



    public function getCart()
    {
    	return view('shop.shopping_cart');
    }


    public function getCheckout()
    {
    		if (Cart::cartQuantity(false)) {
    			return view('shop.checkout');
    		}
    	
    	return redirect()->route('product.index');
    }

    public function postCheckout(Request $request)
    {
    	if (!Cart::cartQuantity(false)) {
                return redirect()->route('product.shoppingcart');
        }	

        \Stripe\Stripe::setApiKey("sk_test_4DprrREKDAz72OiA6ytyG4zZ");
        // Get the credit card details submitted by the form
        $token = $_POST['stripeToken'];



        // Create a charge: this will charge the user's card
        try {
          $charge = \Stripe\Charge::create(array(
            "amount" => Cart::total()*100, // Amount in cents
            "currency" => "usd",
            "source" => $token,
            "description" => "Example charge"
            ));
        } catch(\Stripe\Error\Card $e) {
          // The card has been declined
        }
        $totalCart = [];
        foreach (Cart::contents() as $key => $value) {
            $cartArray['name'] = $value->name;
            $cartArray['subtotal'] = $value->subtotal;
            $cartArray['quantity'] = $value->quantity;
            $totalCart[] = $cartArray;
        }
        Order::create([
            'user_id'=> Auth::user()->id,
            'cart'   => json_encode($totalCart),
            'address'=> $request->input('address'),
            'name'   => $request->input('name'),
            'payment_id' => $charge->id,
        ]);
        Cart::destroy();
        flash()->success('Sucess', 'Product purchased successfully');
    	return redirect()->route('product.index');
    }
}

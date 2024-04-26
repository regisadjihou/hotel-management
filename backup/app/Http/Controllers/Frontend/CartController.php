<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Product;
class CartController extends Controller
{
    public function cart()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('home')->with('cart_empty_error', 'Your cart is empty.');
        }
        return view('frontend.modules.cart',compact('cart'));
    }

    // CartController.php
    public function add_to_cart(Request $request)
    {
       // dd($request);
        $product_id = Crypt::decrypt($request->product_id);
        $product = Product::findOrFail($product_id);

        if($product)
        {
            $cart = session()->get('cart', []);

            if (isset($cart[$product_id])) {
                $cart[$product_id]['quantity']++;
            } else {
                $cart[$product_id] = [
                    'product_id' => $product->id,
                    'title' => $product->title,
                    'price' => $product->price,
                    'quantity' => $request->quantity,
                    'size' => $request->selected_size,
                    'custom' => $request->selected_custom,
                ];
            }
            session(['cart' => $cart]);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

    }
    public function remove_from_cart($product_id)
    {
        // Remove the item from the cart
        $cart = session()->get('cart', []);
        unset($cart[$product_id]);

        // Update the session cart
        session(['cart' => $cart]);

        // Redirect back to the cart or wherever you want
        return redirect()->route('cart')->with(['removed_success' => 'Product removed from cart successfully!']); // Assuming you have a route named 'cart'
    }
    public function update_cart(Request $request)
    {

        $cart = session()->get('cart', []);

        foreach ($request->input('quantity') as $product_id => $quantity) {
            // Validate that $product_id is a valid integer to avoid security issues
            $product_id = (int)$product_id;

            // Update the quantity for the corresponding product in the cart
            if (isset($cart[$product_id])) {
                $cart[$product_id]['quantity'] = max(1, $quantity); // Ensure quantity is at least 1
            }
        }

        // Save the updated cart back to the session
        session(['cart' => $cart]);

        return redirect()->route('cart')->with('updated_success', 'Cart updated successfully!');
    }
    public function clear_cart()
    {
        // Clear the cart session data
        \Illuminate\Support\Facades\Session::flush();

        return redirect()->route('cart')->with('success', 'Cart cleared successfully!');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function getCart()
    {
        $cartItems = Cart::where('user_id', Auth::user()->id)->with('product')->get();
        // dd($catItems);
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('cart', compact('cartItems', 'totalPrice'));
    }
    public function addToCart(Request $request, $id)
    {

        try {
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $id,
                'quantity' => $request->quantity,
            ]);
            return redirect()->route('getCart');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                // return response()->json(['error' => 'هذا المنتج موجود بالفعل في الكارت!'], 409);
                return redirect()->back()->with('error', 'This Product Already Exist in Your Cart !!');
            }

            // return response()->json(['error' => 'Unexpected Error'], 500);
            return redirect()->back()->with('error', 'Unexpected Error');
        }
    }
    public function sendToWhatsApp()
    {
        $cartItems = Cart::where('user_id', Auth::user()->id)->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Cart Is Empty');
        }

        $message = " طلب جديد:\n";

        foreach ($cartItems as $item) {
            $message .= "\n المنتج: {$item->product->name}\n الكمية: {$item->quantity}\n السعر: {$item->product->price} جنيه\n----------------";
        }

        // حساب الإجمالي
        $totalPrice = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
        $message .= "\n\n الإجمالي: {$totalPrice} جنيه";

        // حذف المنتجات من الكارت بعد إرسال الطلب
        Cart::where('user_id', Auth::user()->id)->delete();

        // تحويل الرسالة إلى رابط واتساب
        $phoneNumber = "+201508959006"; // رقم الواتساب الخاص بك
        $encodedMessage = urlencode($message);
        $whatsappUrl = "https://wa.me/{$phoneNumber}?text={$encodedMessage}";

        return redirect()->away($whatsappUrl);
    }
    public function delete($id)
    {
        $cartItem = Cart::where('user_id', Auth::user()->id)->where('id', $id)->first();

        if (!$cartItem) {
            return redirect()->back()->with('error', 'Item Not Found');
        }
    
        $cartItem->delete();
    
        return redirect()->back();
    }
}

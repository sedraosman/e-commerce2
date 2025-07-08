<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        $cartItems = session()->get('cart', []);
        $paymentMethods = PaymentMethod::all();

        return view('cart.checkout', compact('cartItems', 'paymentMethods'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required',
            'payment_method_id' => 'required|exists:payment_methods,id',
        ]);

        $cartItems = session()->get('cart', []);
        if (empty($cartItems)) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty!');
        }

        $totalPrice = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cartItems));

        $order = Order::create([
            'user_id' => Auth::id(),
            'status' => 'pending',
            'shipping_address' => $request->shipping_address,
            'payment_method_id' => $request->payment_method_id,
            'total_price' => $totalPrice,
        ]);

        // مسح سلة المشتريات بعد تنفيذ الطلب
        session()->forget('cart');
        return redirect()->route('cart.success')->with('success', 'Your order has been placed successfully.');
    }

    public function orderList()
    {
        $orders = Order::with('user', 'paymentMethod')->get();
        return view('dashboard.orders.index', compact('orders'));
    }
    
    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        return redirect()->route('admin.orders')->with('success',
         'Order status updated successfully.');
    }

    public function index()
{
    return redirect()->route('admin.orders');
}

}

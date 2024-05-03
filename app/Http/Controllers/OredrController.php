<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SellerShop;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Brand;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlacedVendor;
use Dompdf\Dompdf;
use Dompdf\Options;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Writer;
use Milon\Barcode\DNS1D;
use BaconQrCode\Renderer\RendererStyle\Image;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Exception\CardException;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class OredrController extends Controller
{
    public function index()
    {
        $user_id = auth()->id();
        $shopInfo = SellerShop::where('user_id', auth()->id())->first();
        $shopId = SellerShop::where('user_id', Auth::id())->value('id');

        $Orders = Order::where('shop_id', $shopId)->get();

        $totalOrdersCount = $Orders->count();

        $cOrders = Order::where('shop_id', $shopId)->where('order_status', 'Completed')->get();
        $completedOrders = $cOrders->count();

        $rOrders = Order::where('shop_id', $shopId)->where('order_status', 'Rejected')->get();
        $rejectedOrders = $rOrders->count();

        $pOrders = Order::where('shop_id', $shopId)->where('order_status', 'Pending')->get();
        $pendingOrders = $pOrders->count();

        $totalOrdersCount = $Orders->count();

        $totalProductsOrdered = $cOrders->sum(function ($order) {
            return $order->items->sum('quantity');
        });

        $totalAmountReceived = $cOrders->sum(function ($order) {
            return $order->total_price;
        });

        $totalAmountReturned = $Orders->where('order_status', 'Returned')->sum('total_price');

        $unseenmessages = DB::table('ch_messages')->where('to_id', '=', auth()->id())->where('seen', '=', '0')->count();


        return view('order', compact('shopInfo', 'Orders', 'unseenmessages', 'totalOrdersCount', 'totalAmountReturned', 'totalProductsOrdered', 'totalAmountReceived', 'rejectedOrders', 'completedOrders', 'pendingOrders'));
    }

    public function finance()
    {
        $user_id = auth()->id();
        $shopInfo = SellerShop::where('user_id', auth()->id())->first();
        $shopId = SellerShop::where('user_id', Auth::id())->value('id');

        $Orders = Order::where('shop_id', $shopId)->get();

        $totalOrdersCount = $Orders->count();

        $cOrders = Order::where('shop_id', $shopId)->where('order_status', 'Completed')->get();
        $completedOrders = $cOrders->count();

        $rOrders = Order::where('shop_id', $shopId)->where('order_status', 'Rejected')->get();
        $rejectedOrders = $rOrders->count();

        $pOrders = Order::where('shop_id', $shopId)->where('order_status', 'Pending')->get();
        $pendingOrders = $pOrders->count();

        $aOrders = Order::where('shop_id', $shopId)->where('order_status', 'Accepted')->get();
        $acceptedOrders = $aOrders->count();

        $totalOrdersCount = $Orders->count();

        $totalOrdersCodCount = $cOrders
            ->filter(function ($order) {
                return $order->payment_method === 'cash on delivery';
            })
            ->count();

        $totalOrdersCardCount = $cOrders
            ->filter(function ($order) {
                return $order->payment_method === 'Card Payment';
            })
            ->count();

        $totalProductsOrdered = $cOrders->sum(function ($order) {
            return $order->items->sum('quantity');
        });

        $totalAmountReceived = $cOrders->sum(function ($order) {
            return $order->total_price;
        });

        $totalAmountReceivedCard = $cOrders->where('payment_method', 'Card Payment')->sum('total_price');
        $totalAmountReceivedCashOnDelivery = $cOrders->where('payment_method', 'cash on delivery')->sum('total_price');

        $unseenmessages = DB::table('ch_messages')->where('to_id', '=', auth()->id())->where('seen', '=', '0')->count();

        return view('finance', compact('shopInfo', 'Orders', 'unseenmessages', 'totalOrdersCount', 'totalOrdersCodCount', 'totalOrdersCardCount', 'totalProductsOrdered', 'totalAmountReceived', 'totalAmountReceivedCard', 'totalAmountReceivedCashOnDelivery', 'rejectedOrders', 'acceptedOrders', 'completedOrders', 'pendingOrders'));
    }

    public function placeOrder(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'postalCode' => 'required|string|max:10',
            'phone' => 'required|string|max:15',
            'instructions' => 'nullable|string',
        ]);

        $order = new Order();
        $order->user_id = auth()->id();

        $user_id = auth()->id();

        $cartItems = Cart::where('user_id', $user_id)->get();

        $totalPrice = 0;

        foreach ($cartItems as $item) {
            if ($item->product->discountedPrice) {
                $totalPrice += $item->product->discountedPrice * $item->quantity;
            } else {
                $totalPrice += $item->product->price * $item->quantity;
            }
        }

        $shopIds = $cartItems->pluck('product.shop_id')->unique();

        $order->shop_id = $shopIds->first();

        $order->payment_method = 'cash on delivery';
        $order->order_status = 'Pending';
        $order->delivery_address = $request->input('address');
        $order->postal_code = $request->input('postalCode');
        $order->contact_number = $request->input('phone');
        $order->email = $request->input('email');
        $order->first_name = $request->input('firstName');
        $order->last_name = $request->input('lastName');
        $order->special_instructions = $request->input('instructions');
        $order->tracking_number = Str::random(10);
        $order->Total_price = $totalPrice;

        $order->save();

        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);
            if ($product) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $product->id;
                $orderItem->quantity = $cartItem->quantity;
                $orderItem->product_size = $cartItem->size;
                $orderItem->product_color = $cartItem->color;
                $orderItem->product_name = $product->name;
                $orderItem->image_url = $product->image_url;
                $orderItem->remote_image_url = $product->remote_image_url;
                $orderItem->price = $product->discountedPrice ? $product->discountedPrice : $product->price;
                $orderItem->save();
            }
        }

        $shopOwners = SellerShop::whereIn('id', $shopIds)->get(['user_id']);
        $userIds = $shopOwners->pluck('user_id')->toArray();
        $users = User::whereIn('id', $userIds)->get(['email']);

        $vendorEmail = $users->first()->email;

        $orderId = $order->id;
        $orderItems = OrderItem::where('order_id', $orderId)->get();

        // $mail = new OrderPlacedVendor($order, $orderItems);
        // Mail::to($vendorEmail)->send($mail);

        Cart::where('user_id', auth()->id())->delete();

        return redirect()->route('home')->with('checkout_sucess', 'Order has been placed successfully');
    }

    public function cardOrder(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'postalCode' => 'required|string|max:10',
            'phone' => 'required|string|max:15',
            'instructions' => 'nullable|string',
        ]);

        $order = new Order();
        $order->user_id = auth()->id();

        $user_id = auth()->id();

        $cartItems = Cart::where('user_id', $user_id)->get();

        $totalPrice = 0;

        foreach ($cartItems as $item) {
            if ($item->product->discountedPrice) {
                $totalPrice += $item->product->discountedPrice * $item->quantity;
            } else {
                $totalPrice += $item->product->price * $item->quantity;
            }
        }

        $shopIds = $cartItems->pluck('product.shop_id')->unique();

        $order->shop_id = $shopIds->first();

        $order->payment_method = 'Card Payment';
        $order->order_status = 'Pending';
        $order->delivery_address = $request->input('address');
        $order->postal_code = $request->input('postalCode');
        $order->contact_number = $request->input('phone');
        $order->email = $request->input('email');
        $order->first_name = $request->input('firstName');
        $order->last_name = $request->input('lastName');
        $order->special_instructions = $request->input('instructions');
        $order->tracking_number = Str::random(10);
        $order->Total_price = $totalPrice;

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $description = 'New order payment from ' . $request->input('firstName') . ' - Tracking ID: ' . $order->tracking_number;

        // Create a PaymentIntent
        $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => $totalPrice * 100,
            'currency' => 'AED',
            'payment_method_types' => ['card'],
            'payment_method' => $request->input('stripeToken'),
            'description' => $description,
        ]);

        $order->save();

        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);
            if ($product) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $product->id;
                $orderItem->quantity = $cartItem->quantity;
                $orderItem->product_size = $cartItem->size;
                $orderItem->product_color = $cartItem->color;
                $orderItem->product_name = $product->name;
                $orderItem->image_url = $product->image_url;
                $orderItem->remote_image_url = $product->remote_image_url;
                $orderItem->price = $product->discountedPrice ? $product->discountedPrice : $product->price;
                $orderItem->save();
            }
        }

        $shopOwners = SellerShop::whereIn('id', $shopIds)->get(['user_id']);
        $userIds = $shopOwners->pluck('user_id')->toArray();
        $users = User::whereIn('id', $userIds)->get(['email']);

        $vendorEmail = $users->first()->email;

        $orderId = $order->id;
        $orderItems = OrderItem::where('order_id', $orderId)->get();

        // $mail = new OrderPlacedVendor($order, $orderItems);
        // Mail::to($vendorEmail)->send($mail);

        Cart::where('user_id', auth()->id())->delete();

        return redirect()->route('home')->with('checkout_sucess', 'Order has been placed successfully');
    }

    public function orderDetails($id)
    {
        $user_id = auth()->id();
        $shopInfo = SellerShop::where('user_id', auth()->id())->first();
        $shopId = SellerShop::where('user_id', Auth::id())->value('id');
        $order = Order::find($id);

        if (!$order) {
            return redirect()->route('home')->with('error', 'Order not found');
        }

        $unseenmessages = DB::table('ch_messages')->where('to_id', '=', auth()->id())->where('seen', '=', '0')->count();


        return view('orderDetails', compact('order', 'unseenmessages', 'shopInfo'));
    }

    public function udateOrderStatus($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $status = request('status');
        if (!in_array($status, ['Pending', 'Accepted', 'Completed', 'Rejected', 'Returned'])) {
            return response()->json(['message' => 'Invalid status'], 400);
        }

        $order->order_status = $status;
        $order->save();

        return redirect()->back();
    }

    public function trackOrders($id)
    {
        $user_id = auth()->id();

        $products = Product::all();
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();

        $cart = Cart::where('user_id', $user_id)->get();

        $totalPrice = 0;
        foreach ($cart as $item) {
            if ($item->product->discountedPrice) {
                $totalPrice += $item->product->discountedPrice * $item->quantity;
            } else {
                $totalPrice += $item->product->price * $item->quantity;
            }
        }

        $totalItems = $cart->sum('quantity');
        $trackOrders = Order::find($id);

        $unseenmessages = DB::table('ch_messages')->where('to_id', '=', auth()->id())->where('seen', '=', '0')->count();


        return view('trackOrders', compact('trackOrders', 'unseenmessages', 'brands', 'categories', 'products', 'subcategories', 'totalItems', 'totalPrice', 'cart'));
    }

    public function userOrders()
    {
        $user_id = auth()->id();

        $products = Product::all();
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();


        $cart = Cart::where('user_id', $user_id)->get();

        $totalPrice = 0;
        foreach ($cart as $item) {
            if ($item->product->discountedPrice) {
                $totalPrice += $item->product->discountedPrice * $item->quantity;
            } else {
                $totalPrice += $item->product->price * $item->quantity;
            }
        }

        $totalItems = $cart->sum('quantity');
        $userOrders = Order::where('user_id', $user_id)->get();

        $unseenmessages = DB::table('ch_messages')->where('to_id', '=', auth()->id())->where('seen', '=', '0')->count();


        return view('userOrders', compact('userOrders', 'unseenmessages', 'brands', 'categories', 'products', 'subcategories', 'totalItems', 'totalPrice', 'cart'));
    }

    public function downloadPDF($id)
    {
        $order = Order::findOrFail($id);

        // Generate QR Code
        // $renderer = new ImageRenderer(new Image\Png(), new \BaconQrCode\Renderer\RendererStyle\RendererStyle(400), new \BaconQrCode\Renderer\Image\EpsImageBackEnd());

        // $writer = new Writer($renderer);

        // $qrCode = $writer->writeString($order->tracking_number);

        // Generate Barcode
        // $barcode = new DNS1D();
        // $barcode->setStorPath(__DIR__ . '/cache/');
        // $barcode->setThickness(2);
        // $barcode->setHeight(40);
        // $barcode->setFontSize(10);
        // $barcodeImage = $barcode->getBarcodePNG($order->tracking_number, 'C128');

        // PDF generation
        $pdf = new Dompdf();
        $pdf->setOptions(
            new Options([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
            ]),
        );

        $pdf->loadHtml(view('orderDetails_pdf', compact('order')));

        $pdf->setPaper('A4', 'portrait');

        $pdf->render();

        return $pdf->stream('order_details.pdf');
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->back()->with('update_success', 'Order deleted successfully.');
    }
}

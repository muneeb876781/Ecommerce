<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Cart as CartModel;
use Illuminate\Support\Facades\DB;

class Cart extends Component
{
    public $items;
    public $cart;
    public $categories;
    public $brands;
    public $totalPrice;
    public $totalItems;
    public $unseenmessages;

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->categories = Category::all();
        $this->brands = Brand::all();

        $user_id = auth()->id();

        $this->cart = CartModel::where('user_id', $user_id)->get();

        $this->totalPrice = $this->calculateTotalPrice();
        // dd($this->totalPrice);
        $this->totalItems = $this->cart->sum('quantity');
        // dd($this->totalItems);

        $this->unseenmessages = DB::table('ch_messages')->where('to_id', '=', auth()->id())->where('seen', '=', '0')->count();
    }

    private function calculateTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->cart as $item) {
            if ($item->product->discountedPrice) {
                $totalPrice += $item->product->discountedPrice * $item->quantity;
            } else {
                $totalPrice += $item->product->price * $item->quantity;
            }
        }
        return $totalPrice;
    }

    public function render()
    {
        return view('livewire.cart');
    }

    public function removeItem($id)
    {
        $cartItem = CartModel::find($id);
        if (!$cartItem) {
            abort(404);
        }

        $product = Product::find($cartItem->product_id);
        if ($product) {
            $product->increment('quantity', $cartItem->quantity);
        }

        $cartItem->delete();

        $this->cart = $this->cart->reject(function ($item) use ($id) {
            return $item->id == $id;
        });

        $this->totalPrice = $this->calculateTotalPrice();

        session()->flash('message', 'Item removed from cart.');
    }

    public function decreaseQuantity($itemId)
    {
        $cartItem = CartModel::find($itemId);
        if ($cartItem && $cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
            $this->loadCart(); 
        }
    }

    public function increaseQuantity($id)
    {
        $cartItem = CartModel::find($id);
        if ($cartItem) {
            $cartItem->increment('quantity');
            $this->loadCart();
        }
    }
}

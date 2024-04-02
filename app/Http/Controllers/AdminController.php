<?php

namespace App\Http\Controllers;
use App\Models\SellerShop;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Cart;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $admin = User::where('id', $userId)->first();

        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalSellerShops = SellerShop::count();

        $Users = User::all();
        $Products = Product::all();
        $SellerShops = SellerShop::all();

        return view('adminDashboard', compact('admin', 'totalUsers', 'totalProducts', 'totalSellerShops', 'Users', 'Products', 'SellerShops'));
    }

    public function users()
    {
        $userId = Auth::id();
        $admin = User::where('id', $userId)->first();

        $totalUsers = User::count();
        $sellerUserscount = User::where('role', 'seller')->count();
        $adminUserscount = User::where('role', 'admin')->count();

        $Users = User::all();
        $sellerUsers = User::where('role', 'seller')->get();
        $adminUsers = User::where('role', 'admin')->get();

        return view('Userss', compact('totalUsers', 'admin', 'Users', 'sellerUsers', 'adminUsers', 'sellerUserscount', 'adminUserscount'));
    }

    public function editUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'editUserName' => 'required|string',
            'editUserEmail' => 'required|email',
            'editUserRole' => 'required|string',
        ]);

        $user->name = $validatedData['editUserName'];
        $user->email = $validatedData['editUserEmail'];
        $user->role = $validatedData['editUserRole'];
        $user->save();

        return redirect()->back()->with('success', 'User updated successfully!');
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back()->with('destroy_success', 'User deleted successfully!');
    }
}

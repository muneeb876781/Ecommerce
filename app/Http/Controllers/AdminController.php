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
use Illuminate\Support\Facades\DB;

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

        $tableNames = $this->getTableNames();

        return view('adminDashboard', compact('admin', 'tableNames', 'totalUsers', 'totalProducts', 'totalSellerShops', 'Users', 'Products', 'SellerShops'));
    }

    private function getTableNames()
    {
        $tables = DB::select('SHOW TABLES');
        return array_column($tables, 'Tables_in_' . env('DB_DATABASE'));
    }

    public function showTable($tableName)
    {
        $columns = DB::getSchemaBuilder()->getColumnListing($tableName);
        $data = DB::table($tableName)->get();

        $userId = Auth::id();
        $admin = User::where('id', $userId)->first();

        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalSellerShops = SellerShop::count();

        $Users = User::all();
        $Products = Product::all();
        $SellerShops = SellerShop::all();

        $tableNames = $this->getTableNames();


        return view('adminDataTable', compact('admin', 'tableName', 'columns', 'data',  'tableNames', 'totalUsers', 'totalProducts', 'totalSellerShops', 'Users', 'Products', 'SellerShops'));
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

        $tableNames = $this->getTableNames();

        return view('Userss', compact('totalUsers', 'tableNames', 'admin', 'Users', 'sellerUsers', 'adminUsers', 'sellerUserscount', 'adminUserscount'));
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

        return redirect()->back()->with('destroyUser_success', 'User deleted successfully!');
    }

    public function shops()
    {
        $userId = Auth::id();
        $admin = User::where('id', $userId)->first();

        $shops = SellerShop::all();
        $totalSellerShops = SellerShop::count();

        $tableNames = $this->getTableNames();

        return view('shops', compact('shops', 'tableNames', 'admin', 'totalSellerShops'));
    }

    public function destroyShop($id)
    {
        $shop = SellerShop::findOrFail($id);
        $user = auth()->user();
        $user->role = 'user';
        $user->save();

        $shop->delete();

        return redirect()->back()->with('destroyShop_success', 'Shop deleted successfully!');
    }

    public function adminProfile()
    {
        $userId = Auth::id();
        $admin = User::where('id', $userId)->first();

        $tableNames = $this->getTableNames();

        return view('adminProfile', compact('admin', 'tableNames'));
    }
}

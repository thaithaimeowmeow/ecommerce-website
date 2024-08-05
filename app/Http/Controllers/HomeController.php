<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $product = Product::All();
        $product = Product::inRandomOrder()->get();

        $first = Carousel::All()->first();
        $banner = Carousel::All()->except($first->id);

        return view(
            'homepage.index',
            [
                'product' => $product,
                'first' => $first,
                'banner' => $banner,
            ]
        );
        // return view('home');
    }

    public function search(Request $req)
    {
        $query = $req->input('query');
        if (!$query)
            {
                Alert::warning('Hãy nhập từ khóa tìm kiếm');
                return redirect(route('home'));
            }
        $product = Product::where('name', 'like', '%' . $req->input('query') . '%')->get();

        return view('homepage.search', [
            'query' => $query,
            'product' => $product,
        ]);
        
    }

    public function allProducts(Request $req)
    {
        $product = Product::orderBy('created_at', 'desc')->get();
        return view('homepage.all', [
            'product' => $product,
        ]);
    }
}

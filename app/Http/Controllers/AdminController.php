<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\DataTables\ProductsDataTable;
use App\DataTables\CarouselDataTable;
use App\DataTables\OrdersDataTable;
use App\Models\Carousel;
use App\Models\Order;
use App\Models\Product;
use Intervention\Image\Facades\Image;


class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');
    }

    public function users(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.users.index');
    }
    public function products(ProductsDataTable $dataTable)
    {
        return $dataTable->render('admin.products.index');
    }
    public function carousels(CarouselDataTable $dataTable)
    {
        return $dataTable->render('admin.carousels.index');
    }
    public function formCarousels()
    {
        $product = Product::All();
        return view('admin.carousels.add'
         ,[
             'product' => $product,
         ]
         );
        // return view('admin.carousels.add');
    }
    public function addCarousels()
    {
        $data = request()->validate([
            'label' => [],
            'paragraph' => [],
            'product_id' => [],
            'image' => ['image'],
        ]);
        $banner = new Carousel();
        if ( request('image') != NULL )
        {
            $imagePath = request('image')->store('banner','public');
            $img = Image::make(public_path("storage/{$imagePath}"));
            $img->save();
        }
        else
            $imagePath = $banner->image;

        $banner->label = $data['label'];
        $banner->paragraph = $data['paragraph'];
        $banner->product_id = $data['product_id'];
        $banner->image = $imagePath;


        $banner->save();

        return redirect(route('admin.carousels'));
    }

    public function editCarousel($carousel)
    {
        $carousel = Carousel::findOrFail($carousel);
        // return view('admin.carousels.edit', compact('carousel'));
        $product = Product::All()->except($carousel->product_id);
        return view('admin.carousels.edit'
         ,[
             'carousel' => $carousel,
             'product' => $product,
         ]
         );
    }

    public function updateCarousel($carousel)
    {
        $banner = Carousel::findOrFail($carousel);


        $data = request()->validate([
            'label' => [],
            'paragraph' => [],
            'product_id' => [],
            'image' => ['image'],
        ]);

        if ( request('image') != NULL )
        {
            $imagePath = request('image')->store('banner','public');
            $img = Image::make(public_path("storage/{$imagePath}"));
            $img->save();
        }
        else
            $imagePath = $banner->image;

        $banner->image = $imagePath;
        
        

        $banner->update(array_merge(
            $data,
        )
        );

        $banner->save();

        return redirect(route('admin.carousels'));
    }
    
    
    public function destroyCarousel($carousel)
    {
        $banner = Carousel::find($carousel);
        $banner->delete();
        return redirect(route('admin.carousels'));
    }


    public function orders(OrdersDataTable $dataTable)
    {
        return $dataTable->render('admin.orders.index');
    }
    public function orderView($order)
    {
        $order = Order::findOrFail($order);
        return view('admin.orders.view'
         ,[
             'order' => $order,
         ]
         );
    }
    

}

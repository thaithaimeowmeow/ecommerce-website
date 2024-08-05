<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Cart;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Cart_item;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    //
    public function index()
    {
        return view('admin.products.add');
    }
    //
    public function productViewIndex($product)
    {
        $product = Product::findOrFail($product);
        $allProduct = Product::inRandomOrder()->get()->except($product->id);

        return view(
            'product/index',
            [
                'product' => $product,
                'allProduct' => $allProduct,
            ]
        );
    }


    public function addProduct()
    {
        $data = request()->validate([       //1
            'sku' => ['max:255', 'unique:products','required'],
            'name' => ['max:50','required'],
            'price' => ['required'],
            'quanity' => ['required'],
            'display_price' => [],
            'thumbnail' => ['image'],
            'displayImage' => ['image'],
            'cpu' => ['max:255'],
            'monitor' => ['max:255'],
            'ram' => ['max:255'],
            'gpu' => ['max:255'],
            'storage' => ['max:255'],
            'os' => ['max:255'],
            'battery' => ['max:255'],
            'weight' => ['max:255'],
        ]);
        $product = new Product(); //
        if (request('thumbnail') != NULL) { //2
            $imagePath = request('thumbnail')->store('thumbnails', 'public');//3
            $img = Image::make(public_path("storage/{$imagePath}"));
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(450, 300);
            $img->fit(450, 300);
            $image->save();//
        } else
            $imagePath = $product->thumbnail; //4

        $product->thumbnail = $imagePath; //5

        if (request('displayImage') != NULL) { //6
            $imagePath = request('displayImage')->store('displayImage', 'public');//7
            $img = Image::make(public_path("storage/{$imagePath}"));
            $img->fit(600, 700);
            $img->save();//
        }
         else
            $imagePath = $product->displayImage; //8


        $product->displayImage = $imagePath; //9
        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->display_price = $product->price;
        $product->sku = $data['sku'];
        $product->cpu = $data['cpu'];
        $product->monitor = $data['monitor'];
        $product->ram = $data['ram'];
        $product->gpu = $data['gpu'];
        $product->storage = $data['storage'];
        $product->os = $data['os'];
        $product->battery = $data['battery'];
        $product->weight = $data['weight'];
        $product->quanity = $data['quanity'];
        $product->save();
        Alert::success('Thêm sản phẩm thành công');
        return redirect(route('admin.products'));//
    }

//     if ($data['display_price'] == NULL)
//     $product->display_price = $product->price;
// else
//     $product->display_price = $data['display_price'];



    public function editProduct($product)
    {
        $product = Product::findOrFail($product);
        return view('admin.products.edit', compact('product'));
    }

    public function updateProduct($product)
    {
        $product = Product::findOrFail($product);


        $data = request()->validate([
            'sku' => ['max:255', 'unique:products'],
            'name' => ['max:50'],
            'price' => [],
            'display_price' => [],
            'quanity' => [],
            'thumbnail' => ['image'],
            'displayImage' => ['image'],
            'cpu' => ['max:255'],
            'monitor' => ['max:255'],
            'ram' => ['max:255'],
            'gpu' => ['max:255'],
            'storage' => ['max:255'],
            'os' => ['max:255'],
            'battery' => ['max:255'],
            'weight' => ['max:255'],
        ]);

        if (request('thumbnail') != NULL) {
            $imagePath = request('thumbnail')->store('thumbnails', 'public');

            $img = Image::make(public_path("storage/{$imagePath}"));

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(450, 300);
            $img->fit(450, 300);
            $image->save();
        } else
            $imagePath = $product->thumbnail;

        $product->thumbnail = $imagePath;

        if (request('displayImage') != NULL) {
            $imagePath = request('displayImage')->store('displayImage', 'public');

            $img = Image::make(public_path("storage/{$imagePath}"));
            $img->fit(600, 700);
            $img->save();
        } else
            $imagePath = $product->displayImage;

        $product->displayImage = $imagePath;

        $product->update(
            array_merge(
                $data,
            )
        );

        $product->save();

        // return redirect(route('product.show',$product->id));
        return redirect(route('admin.products'));
    }

    public function destroy($product)
    {
        $product = Product::find($product);
        if (Carousel::where('produt_id', '=', $product->id)) {
            $carousel = Carousel::where('produt_id', '=', $product->id);
            $carousel->delete();
        }
        if (Cart_item::where('produt_id', '=', $product->id)) {
            $items = Cart_item::where('produt_id', '=', $product->id);
            foreach ($items as $item) {
                $item->delete();
            }
        }

        $product->delete();
        return redirect(route('admin.products'));
    }
}

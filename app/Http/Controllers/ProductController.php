<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductController extends Controller
{
    
    public function viewPage()
    {

        $products = Product::all();
        return view('products', compact('products'));
    }

    public function view()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('dashboard.pages.products', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|required|max:255|min:3',
            'price' => 'integer|required',
            'discount' => 'integer|required',
            'category_id' => 'integer|required',
            'details' => 'string|required|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif|max:2022'
        ]);

        if ($request->hasFile('image')) {

            $path = $request->file('image')->store('myPhotos', 'public');
            $originalImageName = basename($path);

            $imgManager = new ImageManager(new Driver());
            $thumbImage = $imgManager->read(storage_path('app/public/myPhotos/' . $originalImageName));
            $thumbImage->resize(550, 604);

            $thumbnailPath = 'thumb_' . $originalImageName;
            $thumbImage->save(storage_path('app/public/thumbnails/' . $thumbnailPath));

            $validated['image'] = $originalImageName; 
            $validated['thumbnail'] = $thumbnailPath; 
        }

        Product::create($validated);

        return redirect()->route('product.view');
    }


    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'string|max:255|min:3',
            'price' => 'integer|min:1',
            'discount' => 'integer|min:1',
            'details' => 'string|max:255|min:1',
            'image' => 'image|mimes:png,jpg,jpeg,gif|max:2022'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = storage_path('app/public/myPhotos/' . $product->image);
            $thumbnailPath = storage_path('app/public/thumbnails/' . $product->thumbnail); // هنا التعديل

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            if (file_exists($thumbnailPath)) {
                unlink($thumbnailPath);
            }
            $path = $request->file('image')->store('myPhotos', 'public');
            $newImageName = basename($path);

            $imgManager = new ImageManager(new Driver());
            $thumbImage = $imgManager->read(storage_path('app/public/myPhotos/' . $newImageName));
            $thumbImage->resize(550, 604);

            $thumbnailPath = 'thumb_' . $newImageName;
            $thumbImage->save(storage_path('app/public/thumbnails/' . $thumbnailPath));

            $validated['image'] = $newImageName;
            $validated['thumbnail'] = $thumbnailPath;
        }

        $product->update($validated);

        return redirect()->route('product.view')->with('success', 'تم تحديث المنتج بنجاح');
    }

   
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $imagePath = storage_path('app/public/myPhotos/' . $product->image);
        $thumbnailPath = storage_path('app/public/thumbnails/' . $product->thumbnail); // هنا التعديل

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        if (file_exists($thumbnailPath)) {
            unlink($thumbnailPath);
        }

        $product->delete();

        return redirect()->route('product.view')->with('success', 'تم حذف المنتج وصوره بنجاح');
    }
}

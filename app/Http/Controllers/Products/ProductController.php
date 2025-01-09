<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua produk beserta kategori, tags, dan gambar
        $products = Product::with(['category', 'tags', 'images'])->get();
        $categories = Category::all();
        $tags = Tag::all();
        // Return ke view
        return view('products', compact('products', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'short_description' => 'required|string|max:255',
            'wood_type' => 'required|string',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'tags' => 'nullable|string',
            'thumb_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images' => 'required|array|size:3', // Tepat 3 file
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('thumb_image')) {
            $thumbnailPath = $request->file('thumb_image')->store('thumbnails', 'public');
        }

        if (count($request->file('images')) !== 3) {
            return back()->withErrors(['error' => 'You must upload exactly 3 images.']);
        }

        DB::beginTransaction();

        try {
            // Buat produk
            $product = Product::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'short_description' => $request->short_description,
                'wood_type' => $request->wood_type,
                'price' => $request->price,
                'thumb_image' => $thumbnailPath ?? null,
                'discount_price' => $request->discount_price,
            ]);

            // Simpan tags
            if ($request->filled('tags')) {
                $tags = json_decode($request->tags, true);
                if (is_array($tags)) {
                    $tagIds = [];
                    foreach ($tags as $tag) {
                        $tagModel = Tag::firstOrCreate(['name' => $tag['value']]);
                        $tagIds[] = $tagModel->id;
                    }
                    $product->tags()->sync($tagIds);
                }
            }

            // Simpan gambar
            foreach ($request->file('images') as $image) {
                $path = $image->store('product_images', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                ]);
            }

            DB::commit();

            return redirect()->route('products.index')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Failed to create product: ' . $e->getMessage()]);
        }
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'short_description' => 'required|string|max:255',
            'wood_type' => 'required|string',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'tags' => 'nullable|string',
            'thumb_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $product = Product::findOrFail($id);

            // Update basic product info
            $product->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'short_description' => $request->short_description,
                'wood_type' => $request->wood_type,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
            ]);

            // Update tags
            if ($request->filled('tags')) {
                $tags = json_decode($request->tags, true);
                if (is_array($tags)) {
                    $product->tags()->detach();

                    $tagIds = [];
                    foreach ($tags as $tag) {
                        $tagModel = Tag::firstOrCreate(['name' => $tag['value']]);
                        $tagIds[] = $tagModel->id;
                    }
                    $product->tags()->attach($tagIds);
                }
            }
            // handle image thumbnails 
            if ($request->hasFile('thumb_image')) {
                // Hapus thumbnail lama
                if ($product->thumb_image) {
                    Storage::disk('public')->delete($product->thumb_image);
                }

                // Simpan thumbnail baru
                $thumbPath = $request->file('thumb_image')->store('thumbnails', 'public');
                $product->update(['thumb_image' => $thumbPath]);
            }

            // Handle new images if uploaded
            if ($request->hasFile('images')) {
                if (count($request->file('images')) > 3) {
                    return back()->withErrors(['error' => 'Maximum 3 images allowed']);
                }

                // Menentukan urutan gambar berdasarkan jumlah gambar yang sudah ada
                $order = $product->images->count() + 1;

                foreach ($request->file('images') as $index => $image) {
                    // Hapus gambar lama di posisi yang sama jika ada
                    if (isset($product->images[$index])) {
                        Storage::disk('public')->delete($product->images[$index]->image_path);
                        $product->images[$index]->delete();
                    }

                    // Simpan gambar baru
                    $path = $image->store('product_images', 'public');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $path,
                        'order' => $order, // Set urutan gambar
                    ]);

                    // Increment urutan untuk gambar berikutnya
                    $order++;
                }
            }


            DB::commit();
            return redirect()->route('products.index')->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Failed to update product: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        // Cek apakah kategori produk ini masih ada
        if (!$product->category) {
            return back()->withErrors(['error' => 'Category not found for this product.']);
        }

        try {
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to delete product: ' . $e->getMessage()]);
        }
    }
}

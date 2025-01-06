<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
            'images' => 'required|array|size:3', // Tepat 3 file
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('category', compact('categories'));
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
        //
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        DB::beginTransaction();
        try {
            Category::create([
                'name' => $request->name,
            ]);
            DB::commit();
            return redirect()->route('category.index')->with('success', 'Category created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Failed to create category: ' . $e->getMessage()]);
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
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        DB::beginTransaction();
        try {
            $category = Category::findOrFail($id);
            $category->update([
                "name" => $request->name,
            ]);
            DB::commit();
            return redirect()->route('category.index')->with('success', 'Category updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Failed to update category: ' . $e->getMessage()]);
        }
    }

    public function destroyAll()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Nonaktifkan foreign key checks
        Category::truncate(); // Hapus semua data di tabel categories
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Aktifkan kembali foreign key checks
        return redirect()->route('category.index')->with('success', 'All categories deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}

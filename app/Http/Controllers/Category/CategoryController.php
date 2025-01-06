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

    public function search(Request $request)
    {
        $output = '';
        $query = $request->search;

        if ($query) {
            $categories = Category::where('name', 'LIKE', "%{$query}%")->get();

            foreach ($categories as $category) {
                $output .= "
            <tr class='border-b dark:border-gray-700'>
                <td class='px-4 py-3'>1</td>
                <th scope='row' class='px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                    {$category->name}
                </th>
                <td class='px-4 py-3'>
                    {$category->created_at->format('d M Y H:i')}
                </td>
                <td class='px-4 py-3 flex items-center justify-end'>
                    <button id='dropdown-button-{$category->id}'
                        data-dropdown-toggle='dropdown-{$category->id}'
                        class='inline-flex items-center text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700 p-1.5 text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100'
                        type='button'>
                        <svg class='w-5 h-5' aria-hidden='true' fill='currentColor' viewbox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z' />
                        </svg>
                    </button>
                </td>
            </tr>";
            }
        }

        return response($output);
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

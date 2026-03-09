<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories (exclude soft-deleted).
     */
    public function index()
    {
        $categories = Category::where('is_delete', false)
            ->with('parent')
            ->orderBy('id', 'desc')
            ->get();

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        $parentCategories = Category::where('is_delete', false)
            ->where('is_active', true)
            ->get();

        return view('category.create', compact('parentCategories'));
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'parent_id'   => 'nullable|exists:categories,id',
            'is_active'   => 'nullable|boolean',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $dest = public_path('uploads/categories');
            if (!is_dir($dest)) {
                mkdir($dest, 0755, true);
            }
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move($dest, $imageName);
            $validated['image'] = 'uploads/categories/' . $imageName;
        }

        $validated['is_active'] = $request->has('is_active') ? true : false;

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(string $id)
    {
        $category = Category::where('is_delete', false)->findOrFail($id);

        // Get IDs to exclude: self + all descendants (prevent circular hierarchy)
        $excludeIds = array_merge([$category->id], $category->getDescendantIds());

        $parentCategories = Category::where('is_delete', false)
            ->where('is_active', true)
            ->whereNotIn('id', $excludeIds)
            ->get();

        return view('category.edit', compact('category', 'parentCategories'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::where('is_delete', false)->findOrFail($id);

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'parent_id'   => 'nullable|exists:categories,id',
            'is_active'   => 'nullable|boolean',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Prevent circular hierarchy: parent_id cannot be self or descendant
        if ($request->filled('parent_id')) {
            $excludeIds = array_merge([$category->id], $category->getDescendantIds());
            if (in_array($request->parent_id, $excludeIds)) {
                return back()->withErrors(['parent_id' => 'Cannot select itself or a descendant as parent category.'])->withInput();
            }
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }
            $dest = public_path('uploads/categories');
            if (!is_dir($dest)) {
                mkdir($dest, 0755, true);
            }
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move($dest, $imageName);
            $validated['image'] = 'uploads/categories/' . $imageName;
        }

        $validated['is_active'] = $request->has('is_active') ? true : false;

        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Soft delete the specified category (set is_delete = true).
     */
    public function destroy(string $id)
    {
        $category = Category::where('is_delete', false)->findOrFail($id);
        $category->update(['is_delete' => true]);

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        $data['records'] = Category::where(['is_delete'=> 0, 'createdBy' => Auth::id() ])->get();

        return view('admin.category.list',$data);

    }

    public function add(Request $request){
        if ($request->isMethod('get')) {
            return view('admin.category.add');
        }

        $fields = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:categories',
            'status' => 'required|in:0,1',
            'meta_title' =>'required|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $userId = Auth::id();

        try {
            $category = Category::create([
                'name' => $fields['name'],
                'slug' => $fields['slug'],
                'status' => $fields['status'],
                'meta_title' => $fields['meta_title'],
                'meta_description' => $fields['meta_description'],
                'meta_keywords' => $fields['meta_keywords'],
                'createdBy' => $userId,

            ]);
            Log::info('New Category successfully created');
            return redirect()->route('category.list')->with('success', 'New Category successfully created');
        } catch (\Exception $e) {
            // Handle any exception (e.g., database error) and redirect back with an error message.
            Log::error('Error adding new category: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error adding new Category');
        }

    }

    public function edit($id, Request $request){
        if ($request->isMethod('get')) {
            $data['record'] = Category::where('id', $id)->first();
            return view('admin.category.edit', $data);
        }
        
        $fields = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:categories',
            'status' => 'required|in:0,1',
            'meta_title' =>'required|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        try {
            $category = Category::findOrFail($id);

            // Update the user fields
            $category->name = $fields['name'];
            $category->slug = $fields['slug'];
            $category->status = $fields['status'];
            $category->meta_title = $fields['meta_title'];
            $category->meta_description = $fields['meta_description'];
            $category->meta_keywords = $fields['meta_keywords'];
            $category->save();

            Log::info('Category successfully updated');
            return redirect()->route('category.list')->with('success', 'Category successfully updated');
        } catch (\Exception $e) {
            Log::error('Error updating Category: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error updating Category');
        }
    
    }

    public function delete($id){
        try {
            $category = Category::findOrFail($id);

            // Update the user fields
            $category->is_delete = 1;
            $category->status = 1;
            $category->save();

            Log::info('Category successfully deleted');
            return redirect()->route('category.list')->with('success', 'Category successfully deleted');
        } catch (\Exception $e) {
            Log::error('Error deleting category: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error deleting category');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;

class SubCategoryController extends Controller
{
    public function index(){

        $perPage = 10;

        // $data['records'] = SubCategory::select('sub_categories.*', 'users.name as createdBy', 'categories.name as category')
        // ->join('users', 'users.id', '=', 'sub_categories.createdBy')
        // ->join('categories', 'categories.id', '=', 'sub_categories.category_id') // Adjust the join condition based on your actual column names
        // ->where('sub_categories.is_delete', '=', 0)
        // ->paginate($perPage);

        $data['records'] = SubCategory::with(['createdByUser', 'category'])
        ->where('is_delete', 0)
        ->paginate($perPage);

        return view('admin.subcategory.list', $data);
    }

    public function add(Request $request){
        if ($request->isMethod('get')) {
            $data['records'] = Category::where('is_delete', 0)->get();
            return view('admin.subcategory.add', $data);
        }

        $fields = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:sub_categories',
            'status' => 'required|in:0,1',
            'category' => 'required',
            'meta_title' =>'required|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $userId = Auth::id();

        try {
            $category = SubCategory::create([
                'name' => $fields['name'],
                'slug' => $fields['slug'],
                'status' => $fields['status'],
                'meta_title' => $fields['meta_title'],
                'meta_description' => $fields['meta_description'],
                'meta_keywords' => $fields['meta_keywords'],
                'createdBy' => $userId,
                'categoryId' => $fields['category'],

            ]);
            Log::info('New SubCategory successfully created');
            return redirect()->route('sub_category.list')->with('success', 'New SubCategory successfully created');
        } catch (\Exception $e) {
            // Handle any exception (e.g., database error) and redirect back with an error message.
            Log::error('Error adding new subcategory: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error adding new SubCategory');
        }

    }

    public function edit($id, Request $request){

        if ($request->isMethod('get')) {
            $data['record'] = SubCategory::where('id', $id)->first();
            $categories['category'] = Category::where('is_delete', 0)->get();
            return view('admin.subcategory.edit', $data,$categories );
        }

        $fields = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'required|in:0,1',
            'category' => 'required',
            'meta_title' =>'required|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        try {
            $Subcategory = SubCategory::findOrFail($id);

            // Update the fields
            $Subcategory->name = $fields['name'];
            $Subcategory->slug = $fields['slug'];
            $Subcategory->status = $fields['status'];
            $Subcategory->categoryId = $fields['category'];
            $Subcategory->meta_title = $fields['meta_title'];
            $Subcategory->meta_description = $fields['meta_description'];
            $Subcategory->meta_keywords = $fields['meta_keywords'];
            $Subcategory->save();

            Log::info('SubCategory successfully updated');
            return redirect()->route('sub_category.list')->with('success', 'SubCategory successfully updated');
        } catch (\Exception $e) {
            Log::error('Error updating SubCategory: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error updating SubCategory');
        }
    }

    public function delete($id){
        try {
            $Subcategory = SubCategory::findOrFail($id);

            // Update the user fields
            $Subcategory->is_delete = 1;
            $Subcategory->status = 1;
            $Subcategory->save();

            Log::info('Sub_category successfully deleted');
            return redirect()->route('sub_category.list')->with('success', 'SubCategory successfully deleted');
        } catch (\Exception $e) {
            Log::error('Error deleting subcategory: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error deleting subcategory');
        }
    }
}

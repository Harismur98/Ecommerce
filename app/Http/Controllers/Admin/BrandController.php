<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index(){

        $perPage = 10;

        $data['records'] = Brand::with(['createdByUser'])
        ->where('is_delete', 0)
        ->paginate($perPage);

        return view('admin.brand.list', $data);
    }


    public function add(Request $request){
        if ($request->isMethod('get')) {
            return view('admin.brand.add');
        }

        $fields = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:brands',
            'status' => 'required|in:0,1',
            // 'meta_title' =>'required|string',
            // 'meta_description' => 'nullable|string',
            // 'meta_keywords' => 'nullable|string',
        ]);

        $userId = Auth::id();

        try {
            $category = Brand::create([
                'name' => $fields['name'],
                'slug' => $fields['slug'],
                'status' => $fields['status'],
                // 'meta_title' => $fields['meta_title'],
                // 'meta_description' => $fields['meta_description'],
                // 'meta_keywords' => $fields['meta_keywords'],
                'createdBy' => $userId,


            ]);
            Log::info('New brand successfully created');
            return redirect()->route('brand.list')->with('success', 'New brand successfully created');
        } catch (\Exception $e) {
            // Handle any exception (e.g., database error) and redirect back with an error message.
            Log::error('Error adding new brand: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error adding new brand');
        }

    }

    public function edit($id, Request $request){

        if ($request->isMethod('get')) {
            $data['record'] = Brand::where('id', $id)->first();
            return view('admin.brand.edit', $data );
        }

        $fields = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:brands',
            'status' => 'required|in:0,1',
            // 'meta_title' =>'required|string',
            // 'meta_description' => 'nullable|string',
            // 'meta_keywords' => 'nullable|string',
        ]);

        try {
            $brand = Brand::findOrFail($id);

            // Update the fields
            $brand->name = $fields['name'];
            $brand->slug = $fields['slug'];
            $brand->status = $fields['status'];
            // $brand->meta_title = $fields['meta_title'];
            // $brand->meta_description = $fields['meta_description'];
            // $brand->meta_keywords = $fields['meta_keywords'];
            $brand->save();

            Log::info('brand successfully updated');
            return redirect()->route('brand.list')->with('success', 'brand successfully updated');
        } catch (\Exception $e) {
            Log::error('Error updating brand: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error updating brand');
        }
    }

    public function delete($id){
        try {
            $brand = Brand::findOrFail($id);

            // Update the user fields
            $brand->is_delete = 1;
            $brand->status = 1;
            $brand->save();

            Log::info('brand successfully deleted');
            return redirect()->route('brand.list')->with('success', 'brand successfully deleted');
        } catch (\Exception $e) {
            Log::error('Error deleting brand: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error deleting brand');
        }
    }
}

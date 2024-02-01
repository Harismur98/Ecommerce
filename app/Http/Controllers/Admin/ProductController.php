<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\product;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\Colour;
use App\Models\Size;
use App\Models\ProductImage;

class ProductController extends Controller
{
    public function index(){
        $perPage = 20;  
        $data['records'] = product::with(['createdByUser', 'category', 'subcategory'])
        ->where('is_delete', 0)
        ->paginate($perPage);
        return view('admin.product.list', $data);
    }

    public function add(Request $request){
        if ($request->isMethod('get')) {
            $data['categories'] = Category::where('is_delete', 0);
            $data['subcategories'] = SubCategory::all();
            $data['brands'] = Brand::all();
            return view('admin.product.add', $data);
        }
        $userId = Auth::id();
        $fields = $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'subcategory' => 'required|string',
            'old_price' => 'required|decimal:2',
            'new_price' => 'required|decimal:2',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'additional_information' => 'nullable|string',
            'shipping_n_returns' => 'nullable|string',
            'status' => 'required|in:0,1',
            'brand' => 'required|string',
        ]);


        //need to check slug duplicate

        try {
            $product = product::create([
                'title' => $fields['title'],
                'slug' => Str::slug($fields['title'], '-'),
                'categoryId' => $fields['category'],
                'subcategoryId' => $fields['subcategory'],
                'old_price' => $fields['old_price'],
                'new_price' => $fields['new_price'],
                'short_description' => $fields['short_description'],
                'description' => $fields['description'],
                'additional_information' => $fields['additional_information'],
                'shipping_n_returns' => $fields['shipping_n_returns'],
                'status' => $fields['status'],
                'createdBy' => $userId,
                'brandId' => $fields['brand'],
            ]);

            Log::info('New Product successfully created');
            return redirect()->route('product.list')->with('success', 'New Product successfully created');
        } catch (\Exception $e) {
            // Handle any exception (e.g., database error) and redirect back with an error message.
            Log::error('Error adding new Product: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error adding new Product');
        }
    }

    public function edit($id, Request $request){

        if ($request->isMethod('get')) {
            $data['record'] = product::where('id', $id)->first();
            $data['category'] = Category::where('is_delete', 0)->get();
            $data['brands'] = Brand::all();
            $data['colours'] = Colour::all();
            return view('admin.product.edit', $data );
        }

        $fields = $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'subcategory' => 'required|string',
            'old_price' => 'required|decimal:2',
            'new_price' => 'required|decimal:2',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'additional_information' => 'nullable|string',
            'shipping_n_returns' => 'nullable|string',
            'status' => 'required|in:0,1',
            'brand' => 'required|string',
            'colour_id' => 'required',
            'size' => 'nullable',
            'sku' => 'required|string',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        try {
            $product = product::findOrFail($id);

            // Update the fields
            $product->title = $fields['title'];
            $product->status = $fields['status'];
            $product->categoryId = $fields['category'];
            $product->old_price = $fields['old_price'];
            $product->new_price = $fields['new_price'];
            $product->description = $fields['description'];
            $product->short_description = $fields['short_description'];
            $product->additional_information = $fields['additional_information'];
            $product->shipping_n_returns = $fields['shipping_n_returns'];
            $product->brandId = $fields['brand'];
            $product->sku = $fields['sku'];
            $product->colour()->sync($fields['colour_id']);
            $product->save();

            //Update size
            $product->size()->delete();
            foreach ($fields['size'] as $size) {
                $product->size()->create([
                    'size' => $size['name'],
                    'price' => $size['price'],
                ]);
            }

            if ($request->hasFile('image')) {
                // dd($request->file('image'));
                foreach ($request->file('image') as $image) {
                    $extension = $image->getClientOriginalExtension();
                    $randomSTR = $product->id . Str::random(20);
                    $filename = strtolower($randomSTR) . '.' . $extension;
                    $image->move('upload/product/', $filename);
                    
                    // Assuming you want to save each image path in a database
                    $product->image()->create([
                        'filename' => $filename,
                        'extension' => $extension,
                    ]);
                }
            }

            Log::info('Product successfully updated');
            return redirect()->route('product.list')->with('success', 'Product successfully updated');
        } catch (\Exception $e) {
            Log::error('Error updating Product: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error updating Product');
        }
    }

    public function delete($id){
        try {
            $product = product::findOrFail($id);

            // Update the user fields
            $product->is_delete = 1;
            $product->status = 1;
            $product->save();

            Log::info('product successfully deleted');
            return redirect()->route('product.list')->with('success', 'product successfully deleted');
        } catch (\Exception $e) {
            Log::error('Error deleting product: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error deleting product');
        }
    }

    public function getSubcategories($category)
    {
        $subcategories = SubCategory::where('categoryId', $category)->where('is_delete', 0)->get();
        return response()->json($subcategories);
    }
}

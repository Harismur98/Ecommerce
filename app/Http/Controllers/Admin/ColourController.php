<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Colour;

class ColourController extends Controller
{
    public function index(){

        $perPage = 10;

        $data['records'] = Colour::with(['createdByUser'])
        ->where('is_delete', 0)
        ->paginate($perPage);

        return view('admin.colour.list', $data);
    }


    public function add(Request $request){
        if ($request->isMethod('get')) {
            return view('admin.colour.add');
        }

        $fields = $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'status' => 'required|in:0,1',

        ]);

        $userId = Auth::id();

        try {
            $category = Colour::create([
                'name' => $fields['name'],
                'code' => $fields['code'],
                'status' => $fields['status'],
                'createdBy' => $userId,


            ]);
            Log::info('New Colour successfully created');
            return redirect()->route('colour.list')->with('success', 'New Colour successfully created');
        } catch (\Exception $e) {
            // Handle any exception (e.g., database error) and redirect back with an error message.
            Log::error('Error adding new Colour: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error adding new Colour');
        }

    }

    public function edit($id, Request $request){

        if ($request->isMethod('get')) {
            $data['record'] = Colour::where('id', $id)->first();
            return view('admin.colour.edit', $data );
        }

        $fields = $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'status' => 'required|in:0,1',

        ]);

        try {
            $colour = Colour::findOrFail($id);

            // Update the fields
            $colour->name = $fields['name'];
            $colour->code = $fields['code'];
            $colour->status = $fields['status'];
            $colour->save();

            Log::info('Colour successfully updated');
            return redirect()->route('colour.list')->with('success', 'Colour successfully updated');
        } catch (\Exception $e) {
            Log::error('Error updating Colour: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error updating Colour');
        }
    }

    public function delete($id){
        try {
            $colour = Colour::findOrFail($id);

            // Update the user fields
            $colour->is_delete = 1;
            $colour->status = 1;
            $colour->save();

            Log::info('Colour successfully deleted');
            return redirect()->route('colour.list')->with('success', 'Colour successfully deleted');
        } catch (\Exception $e) {
            Log::error('Error deleting Colour: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error deleting Colour');
        }
    }
}

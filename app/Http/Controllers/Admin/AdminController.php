<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index(){
        $data['records'] = User::getAdmin(); 
        return view('admin.admin.list', $data);
    }

    public function add(Request $request){

        if ($request->isMethod('get')) {
            return view('admin.admin.add');
        }
        
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
            'status' => 'required|in:0,1',
        ]);

        try {
            $user = User::create([
                'name' => $fields['name'],
                'email' => $fields['email'],
                'password' => $fields['password'],
                'is_admin' => 1,
                'status' => $fields['status'],
            ]);
            Log::info('New Admin successfully created');
            return redirect()->route('admin.list')->with('success', 'New Admin successfully created');
        } catch (\Exception $e) {
            // Handle any exception (e.g., database error) and redirect back with an error message.
            Log::error('Error adding new admin: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error adding new admin');
        }
    }

    public function edit($id, Request $request){
        if ($request->isMethod('get')) {
            $data['record'] = User::where('id', $id)->first();
            return view('admin.admin.edit', $data);
        }
        
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'nullable|string|confirmed',
            'status' => 'required|in:0,1',
        ]);

        try {
            $user = User::findOrFail($id);

            // Update the user fields
            $user->name = $fields['name'];
            $user->email = $fields['email'];

            // Update the password if provided
            if (!empty($fields['password'])) {
                $user->password = bcrypt($fields['password']);
            }

            $user->status = $fields['status'];
            $user->save();

            Log::info('Admin successfully updated');
            return redirect()->route('admin.list')->with('success', 'Admin successfully updated');
        } catch (\Exception $e) {
            Log::error('Error updating admin: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error updating admin');
        }
    
    }

    public function delete($id){
        try {
            $user = User::findOrFail($id);

            // Update the user fields
            $user->is_delete = 1;
            $user->status = 1;
            $user->save();

            Log::info('Admin successfully deleted');
            return redirect()->route('admin.list')->with('success', 'Admin successfully deleted');
        } catch (\Exception $e) {
            Log::error('Error updating admin: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error deleting admin');
        }
    }
}

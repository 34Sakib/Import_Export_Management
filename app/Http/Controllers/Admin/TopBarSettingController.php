<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TopBarSetting;
use DataTables;
use Illuminate\Http\Request;
use Validator;

class TopBarSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = TopBarSetting::query();
            
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row) {
                    $status = $row->is_active ? 'Active' : 'Inactive';
                    $class = $row->is_active ? 'success' : 'danger';
                    return '<span class="badge bg-' . $class . '">' . $status . '</span>';
                })
                ->addColumn('action', function($row) {
                    $btn = '<div class="btn-group">';
                    $btn .= '<button type="button" class="btn btn-primary btn-sm edit-btn" 
                                data-id="' . $row->id . '" 
                                data-email="' . $row->email . '" 
                                data-phone="' . $row->phone . '" 
                                data-opening-hours="' . $row->opening_hours . '" 
                                data-is-active="' . $row->is_active . '">
                                <i class="fas fa-edit"></i> Edit
                            </button>';
                    $btn .= '<button type="button" class="btn btn-danger btn-sm delete-btn" data-id="' . $row->id . '">
                                <i class="fas fa-trash"></i> Delete
                            </button>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        
        return view('backend.top-bar.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if a topbar setting already exists
        if (TopBarSetting::count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Only one topbar setting is allowed. Please update the existing one.'
            ], 422);
        }

        $validator = Validator::make($request->all(), TopBarSetting::rules());

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $setting = TopBarSetting::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Top bar setting created successfully!',
            'data' => $setting
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $setting = TopBarSetting::findOrFail($id);
        
        $validator = Validator::make($request->all(), TopBarSetting::rules());

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $setting->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Top bar setting updated successfully!',
            'data' => $setting
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $setting = TopBarSetting::findOrFail($id);
            $setting->delete();

            return response()->json([
                'success' => true,
                'message' => 'Top bar setting deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting top bar setting',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Toggle the active status of the specified resource.
     */
    public function toggleStatus($id)
    {
        try {
            $setting = TopBarSetting::findOrFail($id);
            $setting->update(['is_active' => !$setting->is_active]);
            
            $status = $setting->is_active ? 'activated' : 'deactivated';
            
            return response()->json([
                'success' => true,
                'message' => "Top bar setting {$status} successfully!"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error toggling status',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

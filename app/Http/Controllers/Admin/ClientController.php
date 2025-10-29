<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $clients = Client::select('*');
            
            return DataTables::of($clients)
                ->addIndexColumn()
                ->addColumn('logo', function($client) {
                    return '<img src="' . $client->logo_url . '" alt="' . $client->name . '" class="img-thumbnail" style="max-width: 80px;">';
                })
                ->addColumn('status', function($client) {
                    $status = $client->is_active ? 'Active' : 'Inactive';
                    $class = $client->is_active ? 'badge bg-success' : 'badge bg-danger';
                    return '<span class="' . $class . '">' . $status . '</span>';
                })
                ->addColumn('action', function($client) {
                    $btn = '<div class="btn-group" role="group">';
                    $btn .= '<button type="button" class="btn btn-sm btn-info view-client" data-id="' . $client->id . '" title="View"><i class="fas fa-eye"></i></button>';
                    $btn .= '<button type="button" class="btn btn-sm btn-primary edit-client" data-id="' . $client->id . '" title="Edit"><i class="fas fa-edit"></i></button>';
                    $btn .= '<button type="button" class="btn btn-sm btn-danger delete-client" data-id="' . $client->id . '" title="Delete"><i class="fas fa-trash"></i></button>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['logo', 'status', 'action'])
                ->make(true);
        }

        return view('backend.pages.clients.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $modalContent = view('backend.pages.clients.modal', [
            'action' => route('admin.clients.store'),
            'method' => 'POST',
            'title' => 'Add New Client',
            'client' => new Client()
        ])->render();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'html' => $modalContent
            ]);
        }

        // For direct access, return the create view
        return view('backend.pages.clients.create', [
            'client' => new Client()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website' => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->except('logo');
        
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/clients', $filename);
            $data['logo'] = $filename;
        }

        Client::create($data);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Client created successfully!',
                'redirect' => route('admin.clients.index')
            ]);
        }

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client, Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'html' => view('backend.pages.clients.view', compact('client'))->render()
            ]);
        }

        // For direct access, return the show view
        return view('backend.pages.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client, Request $request)
    {
        $modalContent = view('backend.pages.clients.modal', [
            'action' => route('admin.clients.update', $client->id),
            'method' => 'PUT',
            'title' => 'Edit Client: ' . $client->name,
            'client' => $client
        ])->render();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'html' => $modalContent
            ]);
        }

        // For direct access, return the edit view
        return view('backend.pages.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website' => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->except('logo');
        
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($client->logo) {
                Storage::delete('public/clients/' . $client->logo);
            }
            
            $file = $request->file('logo');
            $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/clients', $filename);
            $data['logo'] = $filename;
        }

        $client->update($data);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Client updated successfully!',
                'redirect' => route('admin.clients.index')
            ]);
        }

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client, Request $request)
    {
        if ($client->logo) {
            Storage::delete('public/clients/' . $client->logo);
        }
        
        $client->delete();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Client deleted successfully!'
            ]);
        }

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client deleted successfully!');
    }

    /**
     * Toggle client status
     */
    public function toggleStatus(Client $client, Request $request)
    {
        $client->update([
            'is_active' => !$client->is_active
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Client status updated successfully!',
                'is_active' => $client->is_active
            ]);
        }

        return redirect()->back()
            ->with('success', 'Client status updated successfully!');
    }
}

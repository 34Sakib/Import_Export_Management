<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class QuoteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'weight' => 'required|string|max:50',
            'dimensions' => 'required|string|max:100',
            'message' => 'required|string',
        ]);

        try {
            $quote = Quote::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'origin' => $validated['origin'],
                'destination' => $validated['destination'],
                'weight' => $validated['weight'],
                'dimensions' => $validated['dimensions'],
                'message' => $validated['message'],
                'status' => 'pending',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Thank you for your quote request. We will contact you soon!',
                'data' => $quote
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to submit your quote. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $quotes = Quote::latest()->get();
            
            return DataTables::of($quotes)
                ->addIndexColumn()
                ->addColumn('action', function($quote) {
                    $actionBtn = '<div class="d-flex justify-content-center gap-2">';
                    $actionBtn .= '<button class="btn btn-info btn-sm view-quote" data-id="' . $quote->id . '" title="View"><i class="fas fa-eye"></i></button>';
                    $actionBtn .= '<button class="btn btn-danger btn-sm delete-quote" data-id="' . $quote->id . '" title="Delete"><i class="fas fa-trash"></i></button>';
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })
                ->addColumn('status_class', function($quote) {
                    return $quote->status_class;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('backend.pages.quotes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Quote $quote)
    {
        return response()->json([
            'id' => $quote->id,
            'name' => $quote->name,
            'email' => $quote->email,
            'phone' => $quote->phone,
            'origin' => $quote->origin,
            'destination' => $quote->destination,
            'weight' => $quote->weight,
            'dimensions' => $quote->dimensions,
            'message' => $quote->message,
            'status' => $quote->status,
            'status_class' => $quote->status_class,
            'created_at' => $quote->created_at,
            'updated_at' => $quote->updated_at
        ]);
    }

    /**
     * Update the status of the specified resource.
     */
    public function updateStatus(Request $request, Quote $quote)
    {
        try {
            $request->validate([
                'status' => 'required|in:pending,processing,completed,cancelled'
            ]);

            $oldStatus = $quote->status;
            $newStatus = $request->status;

            // Update the status
            $quote->status = $newStatus;
            $quote->save();

            // Refresh the model to get updated data
            $quote->refresh();

            return response()->json([
                'success' => true,
                'message' => 'Quote status updated successfully from ' . ucfirst($oldStatus) . ' to ' . ucfirst($newStatus),
                'status' => $quote->status,
                'status_class' => $quote->status_class
            ]);

        } catch (\Exception $e) {
            \Log::error('Error updating quote status: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to update status: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        try {
            $quote->delete();
            return response()->json([
                'success' => true,
                'message' => 'Quote deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting quote: ' . $e->getMessage()
            ], 500);
        }
    }
}

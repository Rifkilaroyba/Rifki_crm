<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Lead;
use App\Models\Product;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
    public function index()
    {
        $projects = Project::with('lead', 'product')->latest()->get();
        return view('projects.index', compact('projects'));
    }

    public function create(Lead $lead)
    {
        $products = Product::all();
        return view('projects.create', compact('lead', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lead_id' => 'required|exists:leads,id',
            'product_id' => 'required|exists:products,id',
            'notes' => 'nullable|string',
        ]);

        Project::create([
            'lead_id' => $request->lead_id,
            'product_id' => $request->product_id,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        return redirect()->route('projects.index')
            ->with('success', 'Project berhasil dibuat!');
    }

    public function approve(Project $project)
    {
        $project->update(['status' => 'approved']);
        return redirect()->route('projects.index')
            ->with('success', 'Project berhasil disetujui!');
    }
}

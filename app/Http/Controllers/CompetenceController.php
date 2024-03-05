<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use Illuminate\Http\Request;
class CompetenceController extends Controller
{
    public function index()
    {
        $competences = Competence::all();
        return view('competences.index', compact('competences'));
    }

    public function create()
    {
        return view('competences.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:competences|max:255',
            // Add validation rules for other attributes as needed
        ]);

        Competence::create($request->all());

        return redirect()->route('competences.index')
                         ->with('success', 'Competence created successfully.');
    }

    public function show(Competence $competence)
    {
        return view('competences.show', compact('competence'));
    }

    public function edit(Competence $competence)
    {
        return view('competences.edit', compact('competence'));
    }

    public function update(Request $request, Competence $competence)
    {
        $request->validate([
            'name' => 'required|unique:competences,name,' . $competence->id . '|max:255',
            // Add validation rules for other attributes as needed
        ]);

        $competence->update($request->all());

        return redirect()->route('competences.index')
                         ->with('success', 'Competence updated successfully.');
    }

    public function destroy(Competence $competence)
    {
        $competence->delete();

        return redirect()->route('competences.index')
                         ->with('success', 'Competence deleted successfully.');
    }
}

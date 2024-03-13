<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admins;
use App\Models\Entreprise;
use App\Models\PiloteDePromotion;
use App\Models\User;
use App\Models\Etudiant;

class AdminController extends Controller
{
    /**
     * Display a listing of the admins.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admins::all();
        return view('admins.index', compact('admins'));
    }
    public function all()
    {
        $admins = Admins::all();
        return view('Admins.admins', compact('admins'));
    }

    /**
     * Show the form for creating a new admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.create');
    }

    /**
     * Store a newly created admin in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:admins',
        ]);

        Admins::create($request->all());

        return redirect()->route('admins.index')
                         ->with('success', 'Admin created successfully.');
    }

    /**
     * Display the specified admin.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admins $admin)
    {
        return view('admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified admin.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admins $admin)
    {
        return view('admins.edit', compact('admin'));
    }

    /**
     * Update the specified admin in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admins $admin)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:admins,' . $admin->id,
        ]);

        $admin->update($request->all());

        return redirect()->route('admins.index')
                         ->with('success', 'Admin updated successfully.');
    }

    /**
     * Remove the specified admin from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admins $admin)
    {
        $admin->delete();

        return redirect()->route('admins.index')
                         ->with('success', 'Admin deleted successfully.');
    }

    public function etudiants()
    {
        $etudiants = Etudiant::all();
        return view('Admins.etudiants', compact('etudiants'));
    }

    public function pilotes()
    {
        $pilotes = PiloteDePromotion::all();
        return view('Admins.pilotes', compact('pilotes'));
    }

    public function entreprises()
    {
        $entreprises = Entreprise::all();
        return view('Admins.entreprises', compact('entreprises'));
    }

    public function admins()
    {
        $admins = Admins::all();
        return view('Admins.admins', compact('admins'));
    }

    public function users()
    {
        $users = User::all();
        return view('Admins.users', compact('users'));
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
{
    // Récupérer toutes les personnes avec leur créateur
    $people = Person::with('user')->get();

    // Retourner la vue avec les données
    return view('people.index', compact('people'));
}

public function show($id)
{
    // Trouver la personne par son ID
    $person = Person::with(['children', 'parents', 'user'])->findOrFail($id);

    // Retourner la vue avec les détails de la personne
    return view('people.show', compact('person'));
}

public function create()
{
    // Retourner la vue pour créer une nouvelle personne
    return view('people.create');
}

public function store(Request $request)
{
    // Valider les données du formulaire
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'middle_names' => 'nullable|string',
        'birth_name' => 'nullable|string|max:255',
        'date_of_birth' => 'nullable|date',
    ]);

    // Formatage des données
    $formatted = [
        'first_name' => ucfirst(strtolower($validated['first_name'])),
        'last_name' => strtoupper($validated['last_name']),
        'middle_names' => $validated['middle_names'] ? ucwords(strtolower($validated['middle_names'])) : null,
        'birth_name' => strtoupper($validated['birth_name'] ?? $validated['last_name']),
        'created_by' => auth()->id() ?? 1, // 1 pour les tests
    ];

    // Création de la personne avec les données validées
    Person::create($formatted);

    // Rediriger vers la liste des personnes avec un message de succès
    return redirect()->route('people.index')->with('success', 'Personne créée avec succès!');
}

}

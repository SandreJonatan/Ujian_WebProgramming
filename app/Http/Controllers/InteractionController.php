<?php

namespace App\Http\Controllers;

use App\Models\Interaction;
use App\Models\Contact;
use Illuminate\Http\Request;

class InteractionController extends Controller
{
    public function index()
    {
        $interactions = Interaction::with('contact')->paginate(10); // Menggunakan paginate
        return view('interactions.index', compact('interactions'));
    }

    public function create()
    {
        $contacts = Contact::all();
        return view('interactions.create', compact('contacts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'type' => 'required',
            'details' => 'required',
            'date' => 'required|date',
        ]);

        Interaction::create($request->all());
        return redirect()->route('interactions.index')->with('success', 'Interaction recorded successfully.');
    }

    public function edit($id)
    {
        $interaction = Interaction::findOrFail($id);
        $contacts = Contact::all();
        return view('interactions.edit', compact('interaction', 'contacts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'type' => 'required',
            'details' => 'required',
            'date' => 'required|date',
        ]);

        $interaction = Interaction::findOrFail($id);
        $interaction->update($request->all());
        return redirect()->route('interactions.index')->with('success', 'Interaction updated successfully.');
    }

    public function destroy($id)
    {
        $interaction = Interaction::findOrFail($id);
        $interaction->delete();
        return redirect()->route('interactions.index')->with('success', 'Interaction deleted successfully.');
    }
}
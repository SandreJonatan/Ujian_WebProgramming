<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Contact;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('contact')->paginate(10); // Menggunakan paginate
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $contacts = Contact::all();
        return view('sales.create', compact('contacts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'invoice_number' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'status' => 'required|string|in:Pending,Completed,Canceled',
        ]);

        Sale::create($request->all());
        return redirect()->route('sales.index')->with('success', 'Sale created successfully.');
    }

    public function edit(Sale $sale)
    {
        $contacts = Contact::all();
        return view('sales.edit', compact('sale', 'contacts'));
    }

    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'invoice_number' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'status' => 'required|string|in:Pending,Completed,Canceled',
        ]);

        $sale->update($request->all());
        return redirect()->route('sales.index')->with('success', 'Sale updated successfully.');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully.');
    }
}
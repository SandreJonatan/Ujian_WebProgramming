@extends('layouts.app')

@section('title', 'Edit Sale')

@section('content')
<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <form action="{{ route('sales.update', $sale->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="contact_id" class="block text-sm font-medium text-gray-700">Contact</label>
            <select name="contact_id" id="contact_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @foreach ($contacts as $contact)
                    <option value="{{ $contact->id }}" {{ $sale->contact_id == $contact->id ? 'selected' : '' }}>{{ $contact->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="invoice_number" class="block text-sm font-medium text-gray-700">Invoice Number</label>
            <input type="text" name="invoice_number" id="invoice_number" value="{{ $sale->invoice_number }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div class="mb-4">
            <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
            <input type="number" name="amount" id="amount" value="{{ $sale->amount }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="Pending" {{ $sale->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ $sale->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Canceled" {{ $sale->status == 'Canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
        </div>
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update</button>
    </form>
</div>
@endsection
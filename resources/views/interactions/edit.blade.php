@extends('layouts.app')

@section('title', 'Edit Interaction')

@section('content')
<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <form action="{{ route('interactions.update', $interaction->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="contact_id" class="block text-sm font-medium text-gray-700">Contact</label>
            <select name="contact_id" id="contact_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @foreach ($contacts as $contact)
                    <option value="{{ $contact->id }}" {{ $interaction->contact_id == $contact->id ? 'selected' : '' }}>{{ $contact->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
            <input type="text" name="type" id="type" value="{{ $interaction->type }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div class="mb-4">
            <label for="details" class="block text-sm font-medium text-gray-700">Details</label>
            <textarea name="details" id="details" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $interaction->details }}</textarea>
        </div>
        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
            <input type="date" name="date" id="date" value="{{ $interaction->date }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update</button>
    </form>
</div>
@endsection
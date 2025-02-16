@extends('layouts.app')

@section('title', 'Contact Details')

@section('content')
<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-bold">{{ $contact->name }}</h2>
    <p><strong>Company:</strong> {{ $contact->company }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Phone Number:</strong> {{ $contact->phone_number }}</p>
    <div class="mt-4">
        <a href="{{ route('contacts.edit', $contact->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
        </form>
    </div>
</div>
@endsection
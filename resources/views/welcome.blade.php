@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1 class="text-4xl font-bold">Welcome to the CRM Application</h1>
    <p class="mt-4">Manage your contacts, interactions, sales, and reports efficiently.</p>
    <a href="{{ route('contacts.index') }}" class="mt-6 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Get Started</a>
</div>
@endsection
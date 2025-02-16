@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold tracking-tight text-gray-900">Interactions</h1>
<div class="mt-4">
    <a href="{{ route('interactions.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Add Interaction</a>
</div>
<div class="mt-6">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Details</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($interactions as $interaction)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $interaction->contact->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $interaction->type }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $interaction->details }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $interaction->date }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('interactions.edit', $interaction->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    <form action="{{ route('interactions.destroy', $interaction->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">
    {{ $interactions->links() }} <!-- Pagination links -->
</div>
@endsection
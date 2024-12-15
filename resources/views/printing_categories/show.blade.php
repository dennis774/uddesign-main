<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Printing Types for ') . $printing_category->name }}
        </h2>
    </x-slot>
    <div class="container">
        <h1>Printing Types for "{{ $printing_category->name }}"</h1>
        <a href="{{ route('printing_categories.index') }}" class="btn btn-secondary mb-3">Back to Categories</a>
    
        @foreach($printing_category->types as $type)
        <h3>{{ $type->name }}</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @forelse($type->printingDetails as $detail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $detail->quantity }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="2">No details found for this type.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    @endforeach
    
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Merch Details') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1 class="mb-4">Merch Details</h1>
        <a href="{{ route('merch_details.create') }}" class="btn btn-primary mb-3">Add Merch Detail</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Expense Type</th>
                    <th>Pieces</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($merch_details as $detail)
                <tr class="clickable-row" data-href="{{ route('merch_details.show', $detail->id) }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $detail->merchType->name ?? 'No Type Assigned' }}</td>
                    <td>{{ $detail->pcs }}</td>
                    <td>
                        <a href="{{ route('merch_details.edit', $detail->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('merch_details.destroy', $detail->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No Merch Details Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-app-layout>

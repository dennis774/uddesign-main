<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Expenses") }}
                </div>
                <div class="table-responsive mb-6">
                    {{-- <h3>Expense Details</h3> --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Type Name</th>
                                <th>Price</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($expense_details as $detail)
                                <tr>
                                    <td>{{ $detail->expenseType->category->name }}</td>
                                    <td>{{ $detail->expenseType->name }}</td>
                                    <td>{{ $detail->price }}</td>
                                    <td>{{ $detail->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $expense_details->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Merch") }}
                </div>
                <div class="table-responsive">
                    {{-- <h3>Merch Details</h3> --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Type Name</th>
                                <th>Pcs</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($merch_details as $detail)
                                <tr>
                                    <td>{{ $detail->merchType->category->name }}</td>
                                    <td>{{ $detail->merchType->name }}</td>
                                    <td>{{ $detail->pcs }}</td>
                                    <td>{{ $detail->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $merch_details->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Printing") }}
                </div>
                <div class="table-responsive">
                    {{-- <h3>Merch Details</h3> --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Type Name</th>
                                <th>Quantity</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($printing_details as $detail)
                                <tr>
                                    <td>{{ $detail->printingType->category->name }}</td>
                                    <td>{{ $detail->printingType->name }}</td>
                                    <td>{{ $detail->quantity }}</td>
                                    <td>{{ $detail->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $printing_details->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



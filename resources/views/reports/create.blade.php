<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('reports.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="gcash">GCash</label>
                            <input type="number" step="0.01" class="form-control" id="gcash" name="gcash" placeholder="Enter GCash amount" value="{{ old('gcash') }}" />
                        </div>

                        <div class="form-group">
                            <label for="cash">Cash</label>
                            <input type="number" step="0.01" class="form-control" id="cash" name="cash" placeholder="Enter Cash amount" value="{{ old('cash') }}" />
                        </div>

                        <div class="form-group">
                            <label for="print_sales">Print Sales</label>
                            <input type="number" step="0.01" class="form-control" id="print_sales" name="print_sales" required placeholder="Enter Print Sales amount" value="{{ old('print_sales') }}" />
                        </div>

                        <div class="form-group">
                            <label for="merch_sales">Merchandise Sales</label>
                            <input type="number" step="0.01" class="form-control" id="merch_sales" name="merch_sales" required placeholder="Enter Merchandise Sales amount" value="{{ old('merch_sales') }}" />
                        </div>

                        <div class="form-group">
                            <label for="custom_sales">Custom Sales</label>
                            <input type="number" step="0.01" class="form-control" id="custom_sales" name="custom_sales" required placeholder="Enter Custom Sales amount" value="{{ old('custom_sales') }}" />
                        </div>

                        <div class="form-group">
                            <label for="total_sales">Total Sales</label>
                            <input type="number" step="0.01" class="form-control" id="total_sales" name="total_sales" required placeholder="Enter Total Sales amount" value="{{ old('total_sales') }}" />
                        </div>

                        <div class="form-group">
                            <label for="print_expenses">Print Expenses</label>
                            <input type="number" step="0.01" class="form-control" id="print_expenses" name="print_expenses" required placeholder="Enter Print Expenses amount" value="{{ old('print_expenses') }}" />
                        </div>

                        <div class="form-group">
                            <label for="merch_expenses">Merchandise Expenses</label>
                            <input type="number" step="0.01" class="form-control" id="merch_expenses" name="merch_expenses" required placeholder="Enter Merchandise Expenses amount" value="{{ old('merch_expenses') }}" />
                        </div>

                        <div class="form-group">
                            <label for="custom_expenses">Custom Expenses</label>
                            <input type="number" step="0.01" class="form-control" id="custom_expenses" name="custom_expenses" required placeholder="Enter Custom Expenses amount" value="{{ old('custom_expenses') }}" />
                        </div>

                        <div class="form-group">
                            <label for="total_expenses">Total Expenses</label>
                            <input type="number" step="0.01" class="form-control" id="total_expenses" name="total_expenses" required placeholder="Enter Total Expenses amount" value="{{ old('total_expenses') }}" />
                        </div>

                        <button type="submit" class="btn btn-primary">Save Report</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

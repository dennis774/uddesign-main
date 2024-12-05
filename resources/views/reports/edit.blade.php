<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Report') }}
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

                    <form action="{{ route('reports.update', $report->id) }}" method="POST">
                        @csrf @method('PUT')

                        <div class="form-group">
                            <label for="gcash">GCash</label>
                            <input type="number" step="0.01" class="form-control" id="gcash" name="gcash" value="{{ old('gcash', $report->gcash) }}" placeholder="Enter GCash amount" />
                        </div>

                        <div class="form-group">
                            <label for="cash">Cash</label>
                            <input type="number" step="0.01" class="form-control" id="cash" name="cash" value="{{ old('cash', $report->cash) }}" placeholder="Enter Cash amount" />
                        </div>

                        <div class="form-group">
                            <label for="print_sales">Print Sales</label>
                            <input type="number" step="0.01" class="form-control" id="print_sales" name="print_sales" required value="{{ old('print_sales', $report->print_sales) }}" placeholder="Enter Print Sales amount" />
                        </div>

                        <div class="form-group">
                            <label for="merch_sales">Merchandise Sales</label>
                            <input type="number" step="0.01" class="form-control" id="merch_sales" name="merch_sales" required value="{{ old('merch_sales', $report->merch_sales) }}" placeholder="Enter Merchandise Sales amount" />
                        </div>

                        <div class="form-group">
                            <label for="custom_sales">Custom Sales</label>
                            <input type="number" step="0.01" class="form-control" id="custom_sales" name="custom_sales" required value="{{ old('custom_sales', $report->custom_sales) }}" placeholder="Enter Custom Sales amount" />
                        </div>

                        <div class="form-group">
                            <label for="total_sales">Total Sales</label>
                            <input type="number" step="0.01" class="form-control" id="total_sales" name="total_sales" required value="{{ old('total_sales', $report->total_sales) }}" placeholder="Enter Total Sales amount" />
                        </div>

                        <div class="form-group">
                            <label for="print_expenses">Print Expenses</label>
                            <input type="number" step="0.01" class="form-control" id="print_expenses" name="print_expenses" required value="{{ old('print_expenses', $report->print_expenses) }}" placeholder="Enter Print Expenses amount" />
                        </div>

                        <div class="form-group">
                            <label for="merch_expenses">Merchandise Expenses</label>
                            <input
                                type="number"
                                step="0.01"
                                class="form-control"
                                id="merch_expenses"
                                name="merch_expenses"
                                required
                                value="{{ old('merch_expenses', $report->merch_expenses) }}"
                                placeholder="Enter Merchandise Expenses amount"
                            />
                        </div>

                        <div class="form-group">
                            <label for="custom_expenses">Custom Expenses</label>
                            <input
                                type="number"
                                step="0.01"
                                class="form-control"
                                id="custom_expenses"
                                name="custom_expenses"
                                required
                                value="{{ old('custom_expenses', $report->custom_expenses) }}"
                                placeholder="Enter Custom Expenses amount"
                            />
                        </div>

                        <div class="form-group">
                            <label for="total_expenses">Total Expenses</label>
                            <input type="number" step="0.01" class="form-control" id="total_expenses" name="total_expenses" required value="{{ old('total_expenses', $report->total_expenses) }}" placeholder="Enter Total Expenses amount" />
                        </div>

                        <button type="submit" class="btn btn-primary">Update Report</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

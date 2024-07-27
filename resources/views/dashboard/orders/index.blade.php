@extends('dashboard.index')

@section('content')
    <div class="user-dashboard m-2">
        <div class="row">
            <div class="card">
                <div class="card-header" style="">
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Serial</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Payment</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $order->serial }}</td>
                                    <td>{{ $order->date }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->total_amount }}</td>
                                    <td>{{ $order?->payment?->type ?? 'cash on delivery' }}</td>
                                    <td>{{ $order?->customer?->name }}</td>
                                    <td style="width: 30px">


                                        <form action="{{ route('orders.destroy', ['order' => $order->id]) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                style="border: none; background: none; padding: 0; cursor: pointer;">
                                                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

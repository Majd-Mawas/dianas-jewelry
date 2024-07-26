@extends('dashboard.index')

@section('content')
    <div class="user-dashboard m-2">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-sm btn-primary" style="margin-block: 1rem" data-toggle="modal"
                        data-target="#exampleModal">
                        Add Shipping
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Type</th>
                                <th scope="col">Est.Delivery Time</th>
                                <th scope="col">Order</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shippings as $key => $shipping)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ $shipping->name }}</td>
                                    <td>{{ $shipping->price }}</td>
                                    <td>{{ $shipping->weight }}</td>
                                    <td>{{ $shipping->material }}</td>
                                    <td style="overflow-y: scroll; max-width: 250px;">
                                        {{ $shipping->description }}</td>

                                    <td class="text-left">

                                        <form action="{{ route('shipping.destroy', ['shipping' => $shipping->id]) }}"
                                            method="POST" style="display: inline;">
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Shipping Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('shipping.store') }}" method="POST">

                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="cost">Cost</label>
                            <input type="number" class="form-control" id="cost" placeholder="Enter Cost"
                                name="cost" step="0.1" required>
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" id="type" placeholder="Enter Type"
                                name="type" required>
                        </div>
                        <div class="form-group">
                            <label for="estimated_delivery_time">Est.Delivery Time</label>
                            <input type="number" class="form-control" id="estimated_delivery_time"
                                placeholder="Estimated Delivery Time In Days" name="estimated_delivery_time" required>
                        </div>

                        <div class="form-group">
                            <label for="order">Order</label>
                            <select class="form-control" id="order" required>
                                <option hidden selected></option>
                                @foreach ($orders as $oredr)
                                    <option value="{{ $order->id }}">{{ $order->serial }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

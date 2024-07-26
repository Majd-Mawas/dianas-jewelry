@extends('dashboard.index')

@section('content')
    <div class="user-dashboard m-2">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-sm btn-primary" style="margin-block: 1rem" data-toggle="modal"
                        data-target="#exampleModal">
                        Add Product
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Weight</th>
                                <th scope="col">Material</th>
                                <th scope="col">Designer</th>
                                <th scope="col">Category</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td> <a href="{{ asset('storage/' . $product->image) }}" target="_blank">
                                            <img src="{{ asset('storage/' . $product->image) }}" width="50px"
                                                alt="">
                                        </a>
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->weight }}</td>
                                    <td>{{ $product->material }}</td>
                                    <td>{{ $product?->designer?->name }}</td>
                                    <td>{{ $product?->category?->name }}</td>
                                    <td style="overflow-y: scroll; max-width: 250px;">
                                        {{ $product->description }}</td>

                                    <td class="text-left">

                                        <form action="{{ route('products.destroy', ['product' => $product->id]) }}"
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Prouct Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" placeholder="Enter Price"
                                name="price" step="0.1" required>
                        </div>
                        <div class="form-group">
                            <label for="weight">Weight</label>
                            <input type="number" class="form-control" id="weight" placeholder="Enter Weight"
                                name="weight" step="0.01" required>
                        </div>

                        <div class="form-group">
                            <label for="material">Material</label>
                            <input type="text" class="form-control" id="material" placeholder="Enter Material"
                                name="material" required>
                        </div>

                        <div class="form-group">
                            <label for="designer">Designer</label>
                            <select class="form-control" id="designer" name="designer_id " required>
                                <option hidden selected></option>
                                @foreach ($designers as $designer)
                                    <option value="{{ $designer->id }}">{{ $designer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category_id" required>
                                <option hidden selected></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="picture">picture</label>
                            <input type="file" class="form-control-file" id="picture" placeholder="Enter Picture"
                                name="picture" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="required">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
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

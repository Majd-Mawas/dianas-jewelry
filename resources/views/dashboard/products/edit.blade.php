@extends('dashboard.index')

@section('content')
    <div class="user-dashboard m-2">
        <div class="row">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                    value="{{ $product->name }}" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" placeholder="Enter Price"
                                    value="{{ $product->price }}" name="price" step="0.1" required>
                            </div>
                            <div class="form-group">
                                <label for="weight">Weight</label>
                                <input type="number" class="form-control" id="weight" placeholder="Enter Weight"
                                    value="{{ $product->weight }}" name="weight" step="0.01" required>
                            </div>

                            <div class="form-group">
                                <label for="material">Material</label>
                                <input type="text" class="form-control" id="material" placeholder="Enter Material"
                                    value="{{ $product->material }}" name="material" required>
                            </div>

                            <div class="form-group">
                                <label for="condition">Condition</label>
                                <select class="form-control" id="condition" name="condition" required>
                                    <option hidden selected></option>
                                    <option value="New">New</option>
                                    <option value="Used">Used</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="designer">Designer</label>
                                <select class="form-control" id="designer" name="designer_id" required>
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
                                    name="picture">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="required">Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{ $product->description }}
                                </textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-4 mb-4"></div>
        <div class="col-lg-4 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Create Product</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="col-md-12 mb-2">
                            <label for="store_id">Select Store</label>
                            <select class="form-control" name="store_id" id="store_id" required>
                                <option value=""></option>
                                @foreach ($stores as $key => $store)
                                    <option value="{{ $key }}">{{ $store }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('store_id'))
                                <span class="form-text">
                                    <strong class="text-danger form-control-sm">{{ $errors->first('store_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="category_id">Select Category</label>
                            <select class="form-control" name="category_id" id="category_id" required>
                                <option value=""></option>
                                @foreach ($categories as $key => $categorie)
                                    <option value="{{ $key }}">{{ $categorie }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                                <span class="form-text">
                                    <strong class="text-danger form-control-sm">{{ $errors->first('category_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name"
                                placeholder="" required>
                            @if ($errors->has('product_name'))
                                <span class="form-text">
                                    <strong class="text-danger form-control-sm">{{ $errors->first('product_name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-12 mt-3 text-right">
                            <button type="submit" class="btn btn-danger btn-sm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

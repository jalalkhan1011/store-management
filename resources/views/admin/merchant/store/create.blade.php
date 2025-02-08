@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-4 mb-4"></div>
        <div class="col-lg-4 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Create Store</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('stors.store') }}" method="POST">
                        @csrf
                        <div class="col-md-12">
                            <label for="store_name">Store Name</label>
                            <input type="text" class="form-control" id="store_name" name="store_name"
                                placeholder="" required>
                            @if ($errors->has('store_name'))
                                <span class="form-text">
                                    <strong class="text-danger form-control-sm">{{ $errors->first('store_name') }}</strong>
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

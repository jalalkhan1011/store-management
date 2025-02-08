@extends('layouts.app')

@section('content')
    <div class="continer">
        <div class="row">
            <div class="card">
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <p class="bg-danger p-4">{{ $shopeDetail->store_name ?: '' }}</p>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <div class="row">
                        @foreach ($shopeCategories as $shopeCategorie)
                            <div class="col-md-4">
                                <p class="bg-danger p-4">{{ $shopeCategorie->category_name ?: '' }}</p>
                                @php $products = App\Models\Product::where('category_id',$shopeCategorie->id)->orderBy('id','asc')->get();@endphp
                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="col-md-4">
                                            <p class="bg-danger p-4">{{ $product->product_name ?: '' }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

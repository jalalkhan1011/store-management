@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-4 mb-4"></div>
        <div class="col-lg-4 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Merchant List</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Merchant Name</th>
                                <th>Merchant Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($merchants as $merchant)
                                <tr>
                                    <td>{{ $merchant->name ?: '' }}</td>
                                    <td>{{ $merchant->email ?: '' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

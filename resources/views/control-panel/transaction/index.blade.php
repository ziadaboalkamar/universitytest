@extends('layout.app')

@section('content')
    <!-- Responsive tables start -->
    <div class="row" id="table-responsive">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product tables</h4>
                </div>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th scope="col" class="text-nowrap">#</th>
                            <th scope="col" class="text-nowrap">Product</th>
                            <th scope="col" class="text-nowrap">Purchase Price</th>
                            <th scope="col" class="text-nowrap">Store</th>
                            <th scope="col" class="text-nowrap">Created At</th>
                            <th scope="col" class="text-nowrap">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($transactions)
                            @foreach($transactions as $key => $transaction)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>
                                        <h6>{{$transaction->products->name}}</h6>
                                    </td>
                                    <td>
                                        <h6>{{$transaction->purchase_price}}</h6>
                                    </td>
                                    <td>
                                        <h6>{{$transaction->stores->name }}</h6>
                                    </td>
                                    <td>
                                        <h6>{{$transaction->created_at }}</h6>
                                    </td>


                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route("admin.transaction.report",$transaction->id)}}">
                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                    <span>report for product</span>
                                                </a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endisset


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Responsive tables end -->
@endsection

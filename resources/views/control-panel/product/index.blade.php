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
                            <th scope="col" class="text-nowrap">Description</th>
                            <th scope="col" class="text-nowrap">Store</th>
                            <th scope="col" class="text-nowrap">Base Price</th>
                            <th scope="col" class="text-nowrap">Discount Price</th>
                            <th scope="col" class="text-nowrap">Flag</th>
                            <th scope="col" class="text-nowrap">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($products)
                            @foreach($products as $key => $product)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>
                                        <img src="{{asset('storage/'.$product->image)}}" class="mr-75" height="20" width="20" alt="Angular" />
                                        <span class="font-weight-bold">{{$product->name}}</span>
                                    </td>
                                    <td>
                                       <h6>
                                           {{ Illuminate\Support\Str::limit($product->description, 50, $end='...') }}

                                    </td>
                                    <td>
                                        <h6>{{$product->stores->name }}</h6>
                                    </td>
                                    <td>
                                        <h6>{{$product->base_price}}</h6>
                                    </td>
                                    <td>
                                        <h6>{{$product->discount_price}}</h6>
                                    </td>
                                    <td>
                                        <div class="badge badge-glow badge-primary">@if($product->flag == 1) Base Price @else Discount Price @endif</div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route("admin.product.edit",$product->id)}}">
                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <a class="dropdown-item" href="{{route("admin.product.delete",$product->id)}}">
                                                    <i data-feather="trash" class="mr-50"></i>
                                                    <span>Delete</span>
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

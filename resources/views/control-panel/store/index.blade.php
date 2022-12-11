@extends('layout.app')

@section('content')
    <!-- Responsive tables start -->
    <div class="row" id="table-responsive">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Store tables</h4>
                </div>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th scope="col" class="text-nowrap">#</th>
                            <th scope="col" class="text-nowrap">Store</th>
                            <th scope="col" class="text-nowrap">Address</th>
                            <th scope="col" class="text-nowrap">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($stores)
                            @foreach($stores as $key => $store)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>
                                        <img src="{{asset('storage/'.$store->logo)}}" class="mr-75" height="20" width="20" alt="Angular" />
                                        <span class="font-weight-bold">{{$store->name}}</span>
                                    </td>
                                    <td>
                                       <h4>{{$store->address}}</h4>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route("admin.store.edit",$store->id)}}">
                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <a class="dropdown-item" href="{{route("admin.store.delete",$store->id)}}">
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

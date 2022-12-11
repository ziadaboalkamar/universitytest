@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Edit New Product</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- users edit start -->
            <section class="app-user-edit">
                <div class="card">
                    <div class="card-body">
                        <x-alert />
                        {{-- form for store clients --}}
                        <form method="POST" action="{{ route('admin.product.update',$product->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                {{-- client name --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               value="{{ old('name',$product->name) }}"  autofocus>
                                    </div>
                                </div>
                                {{-- end client name --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <img src="{{asset("storage/".$product->image)}}" class="image-fluid" width="100%" alt="{{$product->name}}">
                                </div>
                                {{-- client image --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" id="image" name="image" class="form-control"
                                               data-default-file="" >
                                    </div>
                                </div>
                                {{-- end client image --}}
                                {{-- client image --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <label for="image" class="form-label">Description</label>
                                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Textarea">{{$product->description}}</textarea>
                                    </div>
                                </div>
                                {{-- end client image --}}
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <label for="position" class="form-label">Store</label>
                                        <select class="form-control" name="store_id" id="type">
                                            @isset($stores)
                                                @foreach($stores as $store)
                                                    <option value="{{$store->id}}" @if($store->id == $product->store_id) selected @endif>{{$store->name}}</option>
                                                @endforeach
                                            @endisset

                                        </select>


                                    </div>
                                </div>
                                {{-- client image --}}
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <label for="image" class="form-label">Base price</label>
                                        <input type="text" value="{{$product->base_price}}" id="image" name="base_price" class="form-control"
                                               data-default-file="" required>
                                    </div>
                                </div>
                                {{-- end client image --}}
                                {{-- client image --}}
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <label for="image" class="form-label">Discount Price</label>
                                        <input type="text" value="{{$product->discount_price}}" id="image" name="discount_price" class="form-control"
                                               data-default-file="" required>                                    </div>
                                </div>
                                {{-- end client image --}}
                                <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="image" class="form-label">Flag Price</label>


                                    <div class="demo-inline-spacing">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" @if($product->flag == 1) checked @endif value="1" name="flag" class="custom-control-input" >
                                            <label class="custom-control-label" for="customRadio1">Base price</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input  type="radio" id="customRadio2" @if($product->flag == 0) checked @endif  value="0" name="flag" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio2">Discount Price</label>
                                        </div>

                                    </div>
                                </div>
                                {{-- end client image --}}



                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
                                    <button type="reset" class="btn btn-light">{{ __('Cancel') }}</button>
                                </div>
                            </div>
                        </form>
                        {{-- end form --}}

                    </div>
                </div>
            </section>
            <!-- users edit ends -->

        </div>
    </div>
@endsection

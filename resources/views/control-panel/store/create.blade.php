@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Create New Store</h2>
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
                        <form method="POST" action="{{ route('admin.store.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                {{-- client name --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               value="{{ old('name') }}"  autofocus>
                                    </div>
                                </div>
                                {{-- end client name --}}

                                {{-- client image --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <label for="image" class="form-label">Logo</label>
                                        <input type="file" id="image" name="image" class="form-control"
                                               data-default-file="" required>
                                    </div>
                                </div>
                                {{-- end client image --}}
                                {{-- client image --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <label for="image" class="form-label">address</label>
                                        <input type="text" id="address" name="address" class="form-control"
                                               data-default-file="" required>
                                    </div>
                                </div>
                                {{-- end client image --}}

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
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

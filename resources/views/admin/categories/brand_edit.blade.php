@extends('admin.admin_layouts')
@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('admin/home') }}">{{ config('app.name') }}</a>
            <span class="breadcrumb-item active">Brand</span>
        </nav>

        <div class="sl-pagebody">


            <div class="sl-page-title">
                <h5>Brand Update</h5>
            </div><!-- sl-page-title -->

            <div class="row row-sm mg-t-20">
                <div class="col-md-8">
                    <div class="card pd-20 pd-sm-25">
                        <div class="d-flex justify-content-between align-items-center mg-b-15">
                            <h6 class="card-body-title tx-12 mg-b-5">Brand Update</h6>
                            <a href="{{ route('brands.index') }}"
                               class="float-right btn btn-sm btn-primary tx-13 mg-b-0">Back</a>
                        </div>
                        <div class="card pd-20 pd-sm-40">
                            <div class="table-wrapper">
                                <form method="post" action="{{ route('brands.update', $brand->id) }}" enctype="multipart/form-data">
                                    @csrf @method('patch')
                                    <div class="modal-body pd-20">
                                        <div class="row">
                                            <label class="col-sm-4 form-control-label">Name <span class="tx-danger">*</span></label>
                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ $brand->name }}" placeholder="Enter a brand name" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div><!-- row -->
                                        <div class="row mg-t-20">
                                            <label class="col-sm-4 form-control-label">Logo <span class="tx-danger">*</span></label>
                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                <label class="custom-file">
                                                    <input type="file" id="file" class="custom-file-input" name="logo">
                                                    <span class="custom-file-control custom-file-control-inverse"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div><!-- modal-body -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info pd-x-20">Update</button>
                                    </div>
                                </form>
                            </div><!-- table-wrapper -->

                        </div><!-- card -->

                        <div class="row no-gutters mg-t-1">
                        </div><!-- row -->
                    </div><!-- card -->
                </div><!-- col-4 -->
                <div class="col-md-4 mg-t-20 mg-xl-t-0">
                    <div class="card pd-20 pd-sm-25 bg-sl-primary">
                        <div class="d-flex justify-content-between align-items-center mg-b-15">
                            <h6 class="card-body-title tx-white tx-12 mg-b-5">Old Logo</h6>
                        </div>
                        <div class="bg-black-2">
                            <div class="col tx-center bg-black-3 pd-y-20">
                                <h5 class="tx-lato tx-white tx-bold mg-b-5"><img src="{{ $brand->logo }}"
                                                                                 class="img-fluid"></h5>
                            </div>
                        </div>
                    </div><!-- card -->
                </div><!-- col-4 -->
            </div><!-- row -->
        </div>
    </div>

@endsection

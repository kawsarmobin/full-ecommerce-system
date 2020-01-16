@extends('admin.admin_layouts')
@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('admin/home') }}">{{ config('app.name') }}</a>
            <span class="breadcrumb-item active">Coupon</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Coupon Update</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">
                    Coupon Update
                    <a href="{{ route('coupons.index') }}" class="float-right btn btn-sm btn-primary">Back</a>
                </h6>

                <div class="table-wrapper">
                    <form method="post" action="{{ route('coupons.update', $coupon->id) }}">
                        @csrf @method('patch')
                        <div class="modal-body pd-20">
                            <div class="row">
                                <label class="col-sm-4 form-control-label">Coupon Name <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ $coupon->name }}" placeholder="Enter a brand name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                </div>
                            </div><!-- row -->
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Coupon Percentage(%) <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control @error('discount') is-invalid @enderror" type="text" name="discount" value="{{ $coupon->discount }}" placeholder="Enter a brand name" autofocus>
                                    @error('discount')
                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div><!-- modal-body -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Update</button>
                        </div>
                    </form>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div>
    </div>

@endsection

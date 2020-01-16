@extends('admin.admin_layouts')
@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('admin/home') }}">{{ config('app.name') }}</a>
            <span class="breadcrumb-item active">Coupon</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Coupon Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">
                    Coupon List
                    <a href="" class="float-right btn btn-sm btn-warning" data-toggle="modal" data-target="#modaldemo3">Add
                        New</a>
                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">#</th>
                            <th class="wd-15p">Coupon name</th>
                            <th class="wd-15p">Coupon Percentage(%)</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $index => $row)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->discount }}%</td>
                                <td>
                                    <a href="{{ route('coupons.edit', $row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('coupons.destroy', $row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div>

        <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add New Coupon</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('coupons.store') }}">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-layout">
                                <div class="row mg-b-25">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Coupon Name <span class="tx-danger">*</span></label>
                                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Enter a coupon name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-12">
                                        <div class="form-group mg-b-10-force">
                                            <label class="form-control-label">Coupon Percentage(%) <span class="tx-danger">*</span></label>
                                            <input class="form-control @error('discount') is-invalid @enderror" type="text" name="discount" value="{{ old('discount') }}" placeholder="Enter a coupon name" autofocus>
                                            @error('discount')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div><!-- col-4 -->
                                </div><!-- row -->
                            </div><!-- form-layout -->
                        </div><!-- modal-body -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->

@endsection

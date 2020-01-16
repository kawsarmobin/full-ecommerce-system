@extends('admin.admin_layouts')
@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('admin/home') }}">{{ config('app.name') }}</a>
            <span class="breadcrumb-item active">Blog</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Blog Category Update</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">
                    Blog Category Update
                    <a href="{{ route('blog-categories.index') }}" class="float-right btn btn-sm btn-primary">Back</a>
                </h6>

                <div class="table-wrapper">
                    <form method="post" action="{{ route('blog-categories.update', $blog_category->id) }}">
                        @csrf @method('patch')
                        <div class="modal-body pd-20">
                            <div class="row">
                                <label class="col-sm-4 form-control-label">Category Name (English) <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control @error('name_en') is-invalid @enderror" type="text" name="name_en" value="{{ $blog_category->name_en }}" placeholder="Enter a brand name" autofocus>
                                    @error('name_en')
                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                </div>
                            </div><!-- row -->
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Category Name (Bangla) <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control @error('name_bn') is-invalid @enderror" type="text" name="name_bn" value="{{ $blog_category->name_bn }}" placeholder="Enter a brand name" autofocus>
                                    @error('name_bn')
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

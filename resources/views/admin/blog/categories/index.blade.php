@extends('admin.admin_layouts')
@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('admin/home') }}">{{ config('app.name') }}</a>
            <span class="breadcrumb-item active">Blog</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Blog Category Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">
                    Blog Category List
                    <a href="" class="float-right btn btn-sm btn-warning" data-toggle="modal" data-target="#modaldemo3">Add
                        New</a>
                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">#</th>
                            <th class="wd-15p">Category name (English)</th>
                            <th class="wd-15p">Category name (Bangla)</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blog_categories as $index => $row)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $row->name_en }}</td>
                                <td>{{ $row->name_bn }}</td>
                                <td>
                                    <a href="{{ route('blog-categories.edit', $row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('blog-categories.destroy', $row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add New Blog Category</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('blog-categories.store') }}">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-layout">
                                <div class="row mg-b-25">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Category Name (English)<span class="tx-danger">*</span></label>
                                            <input class="form-control @error('name_en') is-invalid @enderror" type="text" name="name_en" value="{{ old('name_en') }}" placeholder="Enter a coupon name" autofocus>
                                            @error('name_en')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-12">
                                        <div class="form-group mg-b-10-force">
                                            <label class="form-control-label">Category Name (Bangla) <span class="tx-danger">*</span></label>
                                            <input class="form-control @error('name_bn') is-invalid @enderror" type="text" name="name_bn" value="{{ old('name_bn') }}" placeholder="Enter a coupon name" autofocus>
                                            @error('name_bn')
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

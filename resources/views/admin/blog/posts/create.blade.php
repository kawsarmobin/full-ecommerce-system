@extends('admin.admin_layouts')
@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('admin/home') }}">{{ config('app.name') }}</a>
            <span class="breadcrumb-item active">Posts</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Add Post <a class="btn btn-sm btn-warning float-right" href="{{ route('blog-posts.index') }}">All Posts</a></h6>

                <div class="form-layout">
                    <form action="{{ route('blog-posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Title Name (English): <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('title_en') is-invalid @enderror" type="text" name="title_en" value="{{ old('title_en') }}" placeholder="Enter product name">
                                    @error('title_en')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Title Name (Bangla): <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('title_bn') is-invalid @enderror" type="text" name="title_bn" value="{{ old('title_bn') }}" placeholder="Enter product code">
                                    @error('title_bn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose category" name="blog_category_id" required>
                                        <option label="Choose category"></option>
                                        @foreach($blog_categories as $index => $row)
                                            <option value="{{ $row->id }}">{{ $row->name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Post Description (English): <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" id="summernote" name="description_en"></textarea>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Post Description (Bangla): <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" id="summernote1" name="description_bn"></textarea>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Image Thumbnail: <span class="tx-danger">*</span></label>
                                    <label class="custom-file">
                                        <input type="file" id="file" class="custom-file-input" name="image" onchange="readURL1(this)">
                                        <span class="custom-file-control"></span>
                                        <img src="#" id="one">
                                    </label>
                                </div>
                            </div><!-- col-4 -->
                        </div><!-- row -->

                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5" type="submit">Submit</button>
                        </div><!-- form-layout-footer -->
                    </form>
                </div><!-- form-layout -->
            </div><!-- card -->

        </div><!-- sl-pagebody -->
    </div>

    <script>
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection

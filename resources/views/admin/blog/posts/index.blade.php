@extends('admin.admin_layouts')
@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('admin/home') }}">{{ config('app.name') }}</a>
            <span class="breadcrumb-item active">Blog</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Blog Post Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">
                    Post List
                    <a href="{{ route('blog-posts.create') }}" class="float-right btn btn-sm btn-warning">Add New</a>
                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">#</th>
                            <th class="wd-15p">Post Title</th>
                            <th class="wd-15p">Category</th>
                            <th class="wd-15p">Image</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blog_posts as $index => $row)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $row->title_en }}</td>
                                <td>{{ $row->blogCategory->name_en }}</td>
                                <td><img src="{{ $row->image }}" width="64px"></td>
                                <td>
                                    <a href="{{ route('blog-posts.edit', $row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('blog-posts.destroy', $row->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div>

@endsection

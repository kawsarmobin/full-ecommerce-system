@extends('admin.admin_layouts')
@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('admin/home') }}">{{ config('app.name') }}</a>
            <span class="breadcrumb-item active">Product</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Product Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">
                    Product List
                    <a href="{{ route('products.create') }}" class="float-right btn btn-sm btn-warning">Add New</a>
                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">#</th>
                            <th class="wd-15p">Code</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Image</th>
                            <th class="wd-15p">Category</th>
                            <th class="wd-15p">Brand</th>
                            <th class="wd-15p">Quantity</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $index => $row)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $row->product_code }}</td>
                                <td>{{ $row->product_name }}</td>
                                <td><img src="{{ $row->image_one }}" width="64px"></td>
                                <td>{{ $row->category->name }}</td>
                                <td>{{ $row->brand->name }}</td>
                                <td>{{ $row->product_quantity }}</td>
                                <td>
                                    @if ($row->status == 1)
                                        <span class='badge badge-success'>Active</span>
                                    @else
                                        <span class='badge badge-danger'>Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('products.edit', $row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('products.destroy', $row->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash-o"></i></a>
                                    <a href="{{ route('products.show', $row->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
                                    @if ($row->status == 1)
                                        <a href="{{ route('products.change.status', $row->id) }}" class="btn btn-sm btn-danger" title="Inactive"><i class="fa fa-thumbs-down"></i></a>
                                    @else
                                        <a href="{{ route('products.change.status', $row->id) }}" class="btn btn-sm btn-success" title="active"><i class="fa fa-thumbs-up"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div>

@endsection

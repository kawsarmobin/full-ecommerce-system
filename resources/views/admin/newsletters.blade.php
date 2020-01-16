@extends('admin.admin_layouts')
@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('admin/home') }}">{{ config('app.name') }}</a>
            <span class="breadcrumb-item active">Newsletters</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Newsletters Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">
                    Newsletters List
                    <a href="#" class="float-right btn btn-sm btn-danger" id="delete">All Delete</a>
                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">#</th>
                            <th class="wd-15p">Subscriber email</th>
                            <th class="wd-15p">Subscribe date</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($newsletters as $index => $row)
                            <tr>
                                <td><input type="checkbox"> {{ $index+1 }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('destroy.newsletters', $row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div>

@endsection

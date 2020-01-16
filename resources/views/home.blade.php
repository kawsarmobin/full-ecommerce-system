@extends('layouts.app')
@section('content')
    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-8 card">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top"
                             src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRy8uc6tSi0eQ_4J8NdxeLfEjlVpu7lDq3t-Q6L03cSRG-k-cPJ-Q&s"
                             alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a href="{{ route('password.change') }}">Password change</a></li>
                                <li class="list-group-item">Dapibus ac facilisis in</li>
                                <li class="list-group-item">Dapibus ac facilisis in</li>
                                <li class="list-group-item"><a href="{{ route('user.logout') }}" class="btn btn-sm btn-danger btn-block">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

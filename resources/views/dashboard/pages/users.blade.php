@extends('dashboard.layouts.master')
@section('title', 'Users')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, {{ Auth::user()->name }} <span>Welcome Here</span>
                                    @if ($errors->any())
                                        <div class="error-box p-3 mb-3"
                                            style="border: 1px solid red; background-color: #ffe6e6; color: red; border-radius: 5px;">
                                            <ul style="margin: 0; padding-left: 20px;">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Users</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /# row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Users</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <th scope="row">{{ $user->id }}</th>
                                                    <td>{{ $user->name }}</td>
                                                    <td><span class="badge badge-primary">{{ $user->email }}</span></td>
                                                    <td>
                                                        <ul class="d-flex ">
                                                            <li>
                                                                <button type="button" class="btn btn-primary mx-1"
                                                                    data-toggle="modal"
                                                                    data-target="#myModal{{ $user->id }}">
                                                                    Edit
                                                                </button>
                                                            </li>
                                                            <div class="modal fade" id="myModal{{ $user->id }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Edit</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form
                                                                                action="{{ route('user.edit', $user->id) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="form-group">
                                                                                    <label for="name">Name</label>
                                                                                    <input type="text"
                                                                                        class="form-control" name="name"
                                                                                        value="{{ $user->name }}">
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="email">Email</label>
                                                                                    <input type="text"
                                                                                        class="form-control" name="email"
                                                                                        value="{{ $user->email }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="Password">Password</label>
                                                                                    <input type="password"
                                                                                        class="form-control" name="password"
                                                                                        value="">
                                                                                </div>

                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">Close</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">Save
                                                                                        Changes</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>




                                                            <li>
                                                                <button type="button" class="btn btn-danger mx-1"
                                                                    data-toggle="modal"
                                                                    data-target="#myDeleteModal{{ $user->id }}">
                                                                    Delete
                                                                </button>
                                                            </li>
                                                            <div class="modal fade" id="myDeleteModal{{ $user->id }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Delete</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form
                                                                                action="{{ route('user.delete', $user->id) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <div class="form-group">
                                                                                    You want to Delete This user ?!
                                                                                </div>

                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">Close</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger">Delete</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </ul>
                                                    </td>
                                                    {{-- <td class="color-primary">$21.56</td> --}}
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#myModal">
                                            Add user
                                        </button>
                                    </div>

                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('user.store') }}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="name">user Name</label>
                                                            <input type="text" name="name" id="name"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">email</label>
                                                            <input type="text" name="email" id="email"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password">password</label>
                                                            <input type="text" name="password" id="password"
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password_confirmation">Confirm Password</label>
                                                            <input type="text" name="password_confirmation"
                                                                id="password_confirmation" class="form-control">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Add user</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="extra-area-chart"></div>
                            <div id="morris-line-chart"></div>
                            <div class="footer">
                                <p>2025 © Omar Tarek - <a href="#">omarhessain920@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

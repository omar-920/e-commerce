@extends('dashboard.layouts.master')
@section('title', 'products')
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
                                    <li class="breadcrumb-item active">products</li>
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
                                <h4>products</h4>
                            </div>
                            <div class="card-body">
                                <input type="text" id="searchInput" placeholder="Search" class="form-control">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                                <th>Details</th>
                                                <th>Category</th>
                                                <th>Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="productsTable">
                                            @foreach ($products as $product)
                                                <tr>
                                                    <th scope="row">{{ $product->id }}</th>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>{{ $product->discount }}</td>
                                                    <td>{{ $product->details }}</td>
                                                    <td>{{ $product->category->name }}</td>
                                                    <td>
                                                        {{-- <div class="w-30 ">
                                                            <img src="{{asset('storage/' . $product->image)}}" alt="" class="w-100">
                                                        </div> --}}

                                                        <div class="custom-img-container d-flex align-items-center justify-content-center">
                                                            <img src="{{asset('storage/thumbnails/' . $product->thumbnail)}}" alt="Full Image" class="img-fluid">
                                                            {{-- <img src="{{asset('dashboard-assets/images/1.jpg')}}" alt="Full Image" class="img-fluid"> --}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <ul class="d-flex ">
                                                            <li>
                                                                <button type="button" class="btn btn-primary mx-1"
                                                                    data-toggle="modal"
                                                                    data-target="#myModal{{ $product->id }}">
                                                                    Edit
                                                                </button>
                                                            </li>
                                                            <div class="modal fade" id="myModal{{ $product->id }}"
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
                                                                                action="{{ route('product.edit', $product->id) }}"
                                                                                method="POST" enctype="multipart/form-data">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="form-group">
                                                                                    <label for="name">Name</label>
                                                                                    <input type="text"
                                                                                        class="form-control" name="name"
                                                                                        value="{{ $product->name }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="price">Price</label>
                                                                                    <input type="text"
                                                                                        class="form-control" name="price"
                                                                                        value="{{ $product->price }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="discount">Discount</label>
                                                                                    <input type="text"
                                                                                        class="form-control" name="discount"
                                                                                        value="{{ $product->discount }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="details">Details</label>
                                                                                    <input type="text-area" name="details" id="details"
                                                                                        class="form-control text-area" value="{{ $product->details }}" required>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <select name="category_id" id="" class="form-control">
                                                                                        @foreach ($categories as $category)
                                                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="file">Files</label>
                                                                                    {{-- <input type="file" name="image" id="file"
                                                                                        class="form-control" required> --}}
                                                                                    <input type="file" name="image" accept="image/*" >
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
                                                                    data-target="#myDeleteModal{{ $product->id }}">
                                                                    Delete
                                                                </button>
                                                            </li>
                                                            <div class="modal fade" id="myDeleteModal{{ $product->id }}"
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
                                                                                action="{{ route('product.delete', $product->id) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <div class="form-group">
                                                                                    You want to Delete This product ?!
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
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#myModal">
                                            Add products
                                        </button>
                                    </div>

                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('product.store') }}" method="POST"  enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="name">product Name</label>
                                                            <input type="text" name="name" id="name"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="price">product Price</label>
                                                            <input type="text" name="price" id="price"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="discount">product Discount</label>
                                                            <input type="text" name="discount" id="discount"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="details">Details</label>
                                                            <input type="text-area" name="details" id="details"
                                                                class="form-control text-area" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <select name="category_id" id="" class="form-control">
                                                                @foreach ($categories as $category)
                                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="file">Files</label>
                                                            {{-- <input type="file" name="image" id="file"
                                                                class="form-control" required> --}}
                                                            <input type="file" name="image" accept="image/*" required>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Add product</button>
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

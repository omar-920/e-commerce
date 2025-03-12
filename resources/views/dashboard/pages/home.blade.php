@extends('dashboard.layouts.master')
@section('title', 'Home Page')
@section('content')
<div class="content-wrap">
    <div class="main">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
              <div class="page-title">
                <h1>Hello {{Auth::user()->name}} ,<span>Welcome Here</span></h1>
              </div>
            </div>
          </div>
          <!-- /# column -->
          <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
              <div class="page-title">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active">Home Page</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /# column -->
        </div>
        <!-- /# row -->
        <section id="main-content">
          <div class="row">
            <div class="col-lg-12">
              <div id="extra-area-chart"></div>
              <div id="morris-line-chart"></div>
              <div class="footer">
                <p>2018 © Admin Board. - <a href="#">example.com</a></p>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection
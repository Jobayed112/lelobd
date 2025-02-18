@extends('layouts.home')
@section('title')
    Home Page
@endsection
@section('content')
    @include('components.home.slider')
    @include('components.home.exclusive-product')
    @include('components.product.product-page')
    @include('components.home.top-category')
@endsection



@extends('layouts.home')
@section('title')
    Home Page
@endsection
@section('content')

    @include('components.home.header')
    @include('components.product.slider')
    @include('components.product.exclusive-product')
    @include('components.product.top-category')

    @include('components.product.product-page')

    @include('components.home.footer')

@endsection



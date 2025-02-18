@extends('layouts.home')
@section('title')
Product Page
@endsection
@section('content')

@include('components.home.slider')
@include('components.home.exclusive-product')
@include('pages.product.product-page')
@include('components.home.top-category')

@endsection


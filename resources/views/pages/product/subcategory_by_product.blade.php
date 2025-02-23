@extends('layouts.home')
@section('title')
    Sub Category Page
@endsection
@section('content')
@include('components.home.header')
@include('components.product.slider')
@include('components.product.subcategory_by_product')
@include('components.product.top-category')
@include('components.product.product-page')

@include('components.home.footer')
@endsection


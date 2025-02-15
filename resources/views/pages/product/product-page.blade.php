@extends('layouts.home')
@section('title')
Home Page
@endsection
@section('content')

@include('components.home.header')
@include('components.home.slider')
@include('components.home.exclusive-product')
@include('pages.product.product-page')
@include('components.home.top-category')
@include('components.home.footer')
@endsection


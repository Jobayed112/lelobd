@extends('layouts.home')
@section('title')
Product View
@endsection
@section('content')
    @include('components.home.header')
    @include('components.product.product-view')
    @include('components.product.top-category')
    @include('components.product.product-page')

    @include('components.home.footer')
@endsection


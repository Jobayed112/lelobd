@extends('layouts.home')
@section('title')
Product Page
@endsection
@section('content')
@include('components.home.header')
@include('components.product.slider')
@include('components.product.product-page')
@include('components.home.footer')


@endsection


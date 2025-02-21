@extends('layouts.home')
@section('title')
Carts Page
@endsection
@section('content')
@include('components.home.header')

@include('components.product.addToCart.add_to_cart')

@include('components.home.footer')
@endsection

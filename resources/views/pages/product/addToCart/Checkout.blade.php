@extends('layouts.home')
@section('title')
Carts Page
@endsection
@section('content')
@include('components.home.header')

@include('components.product.addToCart.Checkout')

@include('components.home.footer')
@endsection

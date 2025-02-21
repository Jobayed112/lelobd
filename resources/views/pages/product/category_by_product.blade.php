@extends('layouts.home')
@section('title')
{{-- {{$products->category->name}} --}}
@endsection
@section('content')
@include('components.home.header')
@include('components.product.slider')
@include('components.product.category_by_product')
@include('components.home.footer')
@endsection


@extends('layouts.home')
@section('title')
Forgot Form
@endsection
@section('content')

@include('components.home.header')
@include('components.auth.reset-form')
@include('components.home.footer')
@endsection

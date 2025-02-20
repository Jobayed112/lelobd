@extends('layouts.home')
@section('title')
OTP Form
@endsection

@section('content')
@include('components.home.header')

    @include('components.auth.OTP-form')
@include('components.home.footer')

@endsection

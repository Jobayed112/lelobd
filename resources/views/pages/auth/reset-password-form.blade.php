@extends('layouts.home')
@section('title')
Forgot Password Form
@endsection
@section('content')
@include('components.home.header')
@include('components.auth.reset-password-form')
@include('components.home.footer')
@endsection

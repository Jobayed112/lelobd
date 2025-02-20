@extends('layouts.home')
@section('title')
Login Form
@endsection
@section('content')
@include('components.home.header')
@include('components.auth.login-form')
@include('components.home.footer')
@endsection

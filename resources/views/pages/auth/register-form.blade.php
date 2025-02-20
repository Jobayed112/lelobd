@extends('layouts.home')
@section('title')
Register Form
@endsection
@section('content')
@include('components.home.header')
@include('components.auth.register-form')
@include('components.home.footer')
@endsection

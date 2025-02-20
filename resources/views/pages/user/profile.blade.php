@extends('layouts.home')
@section('title')
Profile Page
@endsection
@section('content')
@include('components.home.header')
@include('components.user.profile')
@include('components.home.footer')
@endsection

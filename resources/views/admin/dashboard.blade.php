@extends('layouts.admin')

@section('title')
الرئيسية
@endsection

@section('Contentheader')
الرئيسية
@endsection

@section('Contentheaderlink')
<a href="{{ route('admin.dashboard') }}"> الرئيسية</a>
@endsection
@section('Contentheaderactive')
عرض
@endsection


@section('content')
<div class="row" style="background-image:  url({{asset('assets/admin/imgs/dash.jpg')}});background-size: cover;background-repeat: no-repeat; min-height:600px;"></div>

{{-- <div class="row" style="background-color: url({{asset(assets/ --}}

@endsection
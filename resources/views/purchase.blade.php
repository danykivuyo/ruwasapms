@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Purchase</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a wire:navigate href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item">Purchase</li>
        <li class="breadcrumb-item active">Purchase</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

@endsection
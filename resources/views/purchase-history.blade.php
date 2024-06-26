@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Purchase History</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a wire:navigate href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Cash Pay</li>
                <li class="breadcrumb-item active">Purchase History</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection

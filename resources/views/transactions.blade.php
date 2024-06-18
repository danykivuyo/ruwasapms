@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Transactions</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a wire:navigate href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item">Transactions</li>
    </ol>
    </nav>
    @livewire('transactions-table')
</div><!-- End Page Title -->

@endsection
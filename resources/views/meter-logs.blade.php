@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Meter Logs</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a wire:navigate href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item">Reports</li>
        <li class="breadcrumb-item active">Meter Logs</li>
    </ol>
    </nav>
    @livewire('meter-logs-table')
</div><!-- End Page Title -->

@endsection
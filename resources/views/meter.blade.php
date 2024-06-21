@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>All Meters</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a wire:navigate href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Meter</li>
                <li class="breadcrumb-item active">Info</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    
    @livewire('meter-info')
@endsection

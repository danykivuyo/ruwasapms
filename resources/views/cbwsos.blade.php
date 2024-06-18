@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>All CBWSO</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a wire:navigate href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item">CBWSO</li>
        <li class="breadcrumb-item active">All CBWSO</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<style>
    @media (max-width: 600px) {
        #meters-table-container {
            overflow-x: scroll;
        }
    }
</style>
@livewire('cbwsos-table')

@endsection
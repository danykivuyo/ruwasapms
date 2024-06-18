@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>CBWSO Register</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a wire:navigate href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item">CBWSO</li>
        <li class="breadcrumb-item active">CBWSO Register</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        @livewire('forms.cbwso-register-form')
    </div>
</section>

@endsection
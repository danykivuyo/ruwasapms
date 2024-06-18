@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Meter Register</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a wire:navigate href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item">Meter</li>
        <li class="breadcrumb-item active">Register</li>
      </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">
        @livewire('forms.meter-register-form')
        @livewire('forms.meter-user-register-form')
    </div>
</section>
@endsection
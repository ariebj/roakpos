@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
    </div>
    @if (Auth::user()->role == 'admin')
    @livewire('admin-home')
    @endif
    @if (Auth::user()->role == 'customer')
    @livewire('customer-home')
    @endif
</div>
@endsection
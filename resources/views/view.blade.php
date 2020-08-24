@extends('layouts.app')
@section('content')
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        
        <div class="row">
            <h1>View Information</h1>
        </div>
        
        <div class="row">
            <div class="container">
                <h3>{{ $info->id }}.    {{ $info->info_name }}</h3>
            </div>
            <div class="container">
                <h4>{{ $info->event_name }}</h4>
            </div>
            <div class="container">
                <p>{{ $info->category }}: {{ $info->industry }}</p>
            </div>
            <div class="container">
                <h6>{{ $info->activity_date }} - {{ $info->expiry_date }}</h6>
            </div>
            <div class="container">
                <p class="lead">{{ $info->actual_info }}</p>
            </div>
            <div class="container">
                <a href="#">{{ $info->keywords }}</a>
            </div>
            <div class="container">
                <p>{{ $info->related_agency }}</p>
            </div>
            <div class="container">
                <p>Numerical Value: {{ $info->numerical_value }}</p>
            </div>
            <div class="container">
                <blockquote class="blockquote"><p>{{ $info->other_details }}</p></blockquote>
            </div>
            <div class="container">
                <p>{{ $info->enabled }}</p>
            </div>
            <div class="container">
                <p>Created: {{ $info->created_at }}<br>Last Modified: {{ $info->updated_at }}</p>
            </div>
            
            <div class="container">
                <a href="/" class="btn btn-secondary">Back</a>
                <a href="/view/{{ $info->id }}/update" class="btn btn-primary">Update</a>
                <a href="/delete/{{ $info->id }}" class="btn btn-danger">Delete</a>
            </div>
    </div>
@endsection
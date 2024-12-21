@extends('layouts.app')

@section('title', 'Home')
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

@section('content')
    <div class="jumbotron text-center bg-light p-5 rounded">
        <h1>Welcome to My Website</h1>
        <p class="lead">This is a simple and responsive homepage built with Laravel and Bootstrap.</p>
        <a href="#" class="btn btn-primary btn-lg">Get Started</a>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <img src="#" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Feature 1</h5>
                    <p class="card-text">This is a short description of Feature 1.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Feature 2</h5>
                    <p class="card-text">This is a short description of Feature 2.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Feature 3</h5>
                    <p class="card-text">This is a short description of Feature 3.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>
@endsection


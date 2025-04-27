@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- Centered title -->
        <h1 class="text-center mb-4" style="font-family: 'Arial', sans-serif; color: #FFD700;">Client Profile</h1>

        <!-- Client Profile Card -->
        <div class="card shadow-lg animate__animated animate__fadeInUp animate__delay-1s" style="border-radius: 10px; background-color: #f3e1c1;">
            <div class="card-body">
                <!-- Client Information -->
                <h5 class="card-title" style="color: #800080; font-weight: bold;">Name: {{ $client->name }}</h5>
                <p class="card-text" style="color: #800080;">Age: {{ $client->age }}</p>

                <!-- Programs List -->
                <h6 style="color: #800080;">Programs:</h6>
                <ul>
                    @foreach($client->programs as $program)
                        <li style="color: #800080;">{{ $program->name }}</li>
                    @endforeach
                </ul>

                <!-- Edit Button -->
                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning" style="background-color: #FFD700; color: #800080; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
                    Edit Client
                </a>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- Centered title -->
        <h1 class="text-center mb-4" style="font-family: 'Arial', sans-serif; color: #FFD700;">Create Program</h1>

        <!-- Form centered with animations -->
        <div class="d-flex justify-content-center">
            <div class="card shadow-lg animate__animated animate__fadeInUp animate__delay-1s" style="border-radius: 10px; background-color: #f3e1c1; width: 100%; max-width: 600px;">
                <div class="card-body">
                    <form action="{{ route('programs.store') }}" method="POST">
                        @csrf
                        <!-- Program Name Input -->
                        <div class="mb-3">
                            <label for="name" class="form-label" style="color: #800080; font-weight: bold;">Program Name</label>
                            <input type="text" class="form-control" id="name" name="name" required style="border-radius: 10px;"/>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-lg" style="background-color: #800080; color: white; font-weight: bold; width: 100%; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);" 
                            class="animate__animated animate__fadeIn animate__delay-1s">Create Program</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection

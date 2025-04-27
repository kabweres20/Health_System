@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- Centered title -->
        <h1 class="text-center mb-4" style="font-family: 'Arial', sans-serif; color: #FFD700;">Register Client</h1>

        <!-- Display Validation Errors (if any) -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('clients.store') }}" method="POST" class="animate__animated animate__fadeInUp animate__delay-1s" style="background-color: #f3e1c1; border-radius: 10px; padding: 20px;">
            @csrf

            <!-- Client Name -->
            <div class="mb-3">
                <label for="name" class="form-label" style="color: #800080;">Client Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required style="border: 1px solid #800080;">
            </div>

            <!-- Age -->
            <div class="mb-3">
                <label for="age" class="form-label" style="color: #800080;">Age</label>
                <input type="number" class="form-control" id="age" name="age" value="{{ old('age') }}" required style="border: 1px solid #800080;">
            </div>

            <!-- Programs Selection -->
            <div class="mb-3">
                <label for="programs" class="form-label" style="color: #800080;">Select Programs</label>
                <select name="programs[]" id="programs" class="form-control" multiple required style="border: 1px solid #800080;">
                    @foreach($programs as $program)
                        <option value="{{ $program->id }}" {{ in_array($program->id, old('programs', [])) ? 'selected' : '' }} style="color: #800080;">
                            {{ $program->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-3" style="background-color: #FFD700; color: #800080; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
                Register Client
            </button>
        </form>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection

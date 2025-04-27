@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- Centered title -->
        <h1 class="text-center mb-4" style="font-family: 'Arial', sans-serif; color: #FFD700;">Clients</h1>

        <!-- Search Form -->
        <div class="d-flex justify-content-center mb-4">
            <form method="GET" action="{{ route('clients.index') }}" class="w-50">
                <div class="input-group">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or age" class="form-control">
                    <button type="submit" class="btn btn-primary mt-2" style="background-color: #800080; color: white; font-weight: bold; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                        Search
                    </button>
                </div>
            </form>
        </div>

        <!-- Centered Register Client Button -->
        <div class="d-flex justify-content-center mb-4">
            <a href="{{ route('clients.create') }}" class="btn btn-lg" style="background-color: #800080; color: white; font-weight: bold; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                Register Client
            </a>
        </div>

        <!-- Client Table -->
        <div class="table-responsive">
            <table class="table table-striped mt-3" style="background-color: #f3e1c1; border-radius: 10px;">
                <thead>
                    <tr>
                        <th style="color: #800080;">Name</th>
                        <th style="color: #800080;">Age</th>
                        <th style="color: #800080;">Programs</th>
                        <th style="color: #800080;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->age }}</td>
                            <td>
                                @foreach($client->programs as $program)
                                    {{ $program->name }}@if(!$loop->last), @endif
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info btn-sm" style="background-color: #FFD700; color: #800080; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
                                    View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

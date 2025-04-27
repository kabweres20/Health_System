@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- Centered title -->
        <h1 class="text-center mb-4" style="font-family: 'Arial', sans-serif; color: #FFD700;">Programs</h1>

        <!-- Centered Create Program Button -->
        <div class="d-flex justify-content-center mb-4">
            <!-- Trigger Modal for Creating Program -->
            <button class="btn btn-lg" style="background-color: #800080; color: white; font-weight: bold; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);" data-bs-toggle="modal" data-bs-target="#createProgramModal">
                Create Program
            </button>
        </div>

        <!-- Centered Program Cards -->
        <div class="row justify-content-center">
            @foreach($programs as $program)
                <div class="col-md-4 mb-4">
                    <!-- Floating Card with animations -->
                    <div class="card shadow-lg animate__animated animate__fadeInUp animate__delay-1s" style="border-radius: 10px; background-color: #f3e1c1;">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="color: #800080; font-weight: bold;">{{ $program->name }}</h5>
                            <div class="d-flex justify-content-between">
                                <!-- Trigger Modal for Editing Program -->
                                <button class="btn btn-warning btn-sm" style="background-color: #FFD700; color: #800080; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);" 
                                    data-bs-toggle="modal" data-bs-target="#editProgramModal{{ $program->id }}">
                                    Edit
                                </button>

                                <!-- Delete Program Form -->
                                <form action="{{ route('programs.destroy', $program->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Program Modal -->
                <div class="modal fade" id="editProgramModal{{ $program->id }}" tabindex="-1" aria-labelledby="editProgramModalLabel{{ $program->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editProgramModalLabel{{ $program->id }}" style="color: #800080;">Edit Program</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('programs.update', $program->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="name" class="form-label" style="color: #800080; font-weight: bold;">Program Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $program->name) }}" required>
                                    </div>

                                    <button type="submit" class="btn btn-lg" style="background-color: #800080; color: white; font-weight: bold; width: 100%; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                                        Update Program
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Create Program Modal -->
    <div class="modal fade" id="createProgramModal" tabindex="-1" aria-labelledby="createProgramModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createProgramModalLabel" style="color: #800080;">Create Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('programs.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label" style="color: #800080; font-weight: bold;">Program Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <button type="submit" class="btn btn-lg" style="background-color: #800080; color: white; font-weight: bold; width: 100%; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                            Create Program
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection

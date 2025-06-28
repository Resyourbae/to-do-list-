@extends('layouts.app')

@section('title', 'Tambah Tugas')

@section('content')
    <div class="mb-6">
        <h1 style="font-size: 1.5rem; font-weight: 600;">Tambah Tugas Baru</h1>
    </div>

    <form action="{{ route('task.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label class="form-label" for="title">Judul Tugas</label>
            <input type="text" class="form-control @error('title') border-red-500 @enderror" id="title" name="title"
                value="{{ old('title') }}" required placeholder="Masukkan judul tugas">
            @error('title')
                <p class="text-sm" style="color: var(--danger); margin-top: 0.25rem;">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="description">Deskripsi</label>
            <textarea class="form-control @error('description') border-red-500 @enderror" id="description"
                name="description" rows="3" placeholder="Masukkan deskripsi tugas">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-sm" style="color: var(--danger); margin-top: 0.25rem;">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="deadline">Deadline</label>
            <input type="date" class="form-control @error('deadline') border-red-500 @enderror" id="deadline"
                name="deadline" value="{{ old('deadline') }}">
            @error('deadline')
                <p class="text-sm" style="color: var(--danger); margin-top: 0.25rem;">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="{{ route('task.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Batal
            </a>
        </div>
    </form>
@endsection
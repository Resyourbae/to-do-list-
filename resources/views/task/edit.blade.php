@extends('layouts.app')

@section('title', 'Edit Tugas')

@section('content')
    <div class="mb-6">
        <h1 style="font-size: 1.5rem; font-weight: 600;">Edit Tugas</h1>
    </div>

    <form action="{{ route('task.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label" for="title">Judul Tugas</label>
            <input type="text" 
                   class="form-control @error('title') border-red-500 @enderror" 
                   id="title" 
                   name="title" 
                   value="{{ old('title', $task->title) }}" 
                   required
                   placeholder="Masukkan judul tugas">
            @error('title')
                <p class="text-sm" style="color: var(--danger); margin-top: 0.25rem;">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="description">Deskripsi</label>
            <textarea class="form-control @error('description') border-red-500 @enderror" 
                      id="description" 
                      name="description" 
                      rows="3"
                      placeholder="Masukkan deskripsi tugas">{{ old('description', $task->description) }}</textarea>
            @error('description')
                <p class="text-sm" style="color: var(--danger); margin-top: 0.25rem;">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="deadline">Deadline</label>
            <input type="date" 
                   class="form-control @error('deadline') border-red-500 @enderror" 
                   id="deadline" 
                   name="deadline" 
                   value="{{ old('deadline', $task->deadline) }}">
            @error('deadline')
                <p class="text-sm" style="color: var(--danger); margin-top: 0.25rem;">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group flex items-center gap-2 mb-4">
            <input type="checkbox" id="completed" name="completed" value="1" {{ old('completed', $task->completed) ? 'checked' : '' }}>
            <label for="completed" class="form-label" style="margin-bottom:0;">Selesai</label>
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
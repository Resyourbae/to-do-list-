<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <div class="container mx-auto py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold">Daftar Tugas</h1>
            <a href="{{ route('task.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Tugas
            </a>
        </div>

        @if(($tasks ?? collect())->isEmpty())
            <div class="text-center py-12">
                <i class="fas fa-clipboard-list text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500">Belum ada tugas. Mulai tambahkan tugas baru!</p>
            </div>
        @else
            <div class="todolist">
                @foreach($tasks as $task)
                    <div class="task-item bg-gray-50 p-4 rounded-md mb-4 border border-gray-200">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="{{ $task->completed ? 'completed' : '' }} text-lg font-medium">
                                {{ $task->title }}
                            </h3>
                            <span
                                class="badge py-1 px-3 rounded-full text-xs font-semibold {{ $task->completed ? 'bg-green-500' : 'bg-yellow-500' }} text-white">
                                {{ $task->completed ? 'Selesai' : 'Belum' }}
                            </span>
                        </div>

                        @if($task->description)
                            <p class="text-sm text-gray-700 mb-2">{{ $task->description }}</p>
                        @endif

                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">
                                <i class="far fa-calendar-alt"></i>
                                Deadline: {{ $task->deadline ? date('d/m/Y', strtotime($task->deadline)) : '-' }}
                            </span>

                            <div class="flex gap-2">
                                <a href="{{ route('task.edit', $task->id) }}" class="btn btn-secondary text-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('task.destroy', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-secondary text-sm text-red-600"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
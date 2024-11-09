<x-app-layout>

@section('content')
    <h1>{{ $category->name }} Levels</h1>
    <div class="levels">
        @foreach($category->levels as $level)
            <div class="level">
                <h3>Level {{ $level->level }}</h3>
                @if($userProgress->where('level', $level->level)->isNotEmpty())
                    <p>Status: Completed</p>
                @else
                    <p>Status: Incomplete</p>
                    <form action="{{ route('user.content.submitRecording', ['category' => $category->id, 'level' => $level->level]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="audio">Record Audio:</label>
                        <input type="file" name="audio" accept="audio/*" required>
                        <button type="submit">Submit Recording</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
</x-app-layout>

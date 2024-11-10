<x-app-layout>
    <div class="py-8 px-4 bg-gray-50 min-h-screen">
        <h1 class="text-4xl font-bold text-center mb-10 text-gray-800">{{ $category->name }} Levels</h1>

        <!-- Levels Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($category->levels as $level)
                <div class="bg-white p-6 rounded-lg shadow-lg relative">
                    <h3 class="text-2xl font-semibold mb-4 text-gray-700">Level {{ $level->level }}</h3>

                    <!-- Check if level is completed or locked -->
                    @if($userProgress->where('level', $level->level)->isNotEmpty())
                        <a href="{{ route('user.content.level', ['category' => $category->id, 'level' => $level->level]) }}"
                           class="block text-green-500 font-bold mb-4 hover:text-green-600">
                           <p>Status: Completed</p>
                           <p>Go to Level</p>
                        </a>
                    @elseif($userProgress->where('level', $level->level - 1)->isNotEmpty() || $level->level == 1)
                        <!-- Unlock if previous level completed or it's the first level -->
                        <a href="{{ route('user.content.level', ['category' => $category->id, 'level' => $level->level]) }}"
                           class="block text-yellow-500 font-bold mb-4 hover:text-yellow-600">
                           <p>Status: Incomplete</p>
                           <p>Start Level</p>
                        </a>
                    @else
                        <!-- Lock level if previous is incomplete -->
                        <p class="text-red-500 font-bold mb-4">Locked</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

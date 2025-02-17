<x-professional-layout>
    @section('professional_content')
    <div class="flex justify-center items-start min-h-screen bg-gray-100 pt-16 py-16">
        <div class="w-full lg:w-9/12 xl:w-8/12 bg-transparent border-4 border-purple-600 p-8 rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold text-center text-purple-600 mb-8">View Exercises of Users</h1>

            <!-- Display Users -->
            <div class="grid grid-cols-1 gap-6">
                @foreach ($users as $user)
                    <div class="flex justify-between items-center border-b border-gray-300 py-4">
                        <!-- User Name with Link -->
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('professional.userExercises.show', $user->id) }}"
                               class="bg-purple-600 text-white px-4 py-2 rounded-lg font-semibold">
                               {{ $user->name }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @stop
</x-professional-layout>

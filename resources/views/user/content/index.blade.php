<x-app-layout>
    <div class="py-8 px-4 bg-gray-100 mt-24">
        <h1 class="text-3xl font-semibold text-center mb-8">LET'S PRACTICE</h1>

        <!-- Display Alert for Locked Categories (only show when category is locked) -->
        @if(session('error'))
            <div class="max-w-lg mx-auto mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif

        <!-- Categories Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($categories as $category)
            <a href="{{ $category->unlocked ? route('user.content.category', $category->id) : '#' }}"
                class="relative bg-blue-600 text-white p-6 rounded-lg shadow-lg transition duration-300 ease-in-out group block hover:bg-blue-700"
                onclick="return handleCategoryClick(event, {{ $category->unlocked ? 'true' : 'false' }})">
                 <!-- Lock Icon for Locked Categories (Centered) -->
                 @if(!$category->unlocked)
                     <div class="absolute inset-0 flex items-center justify-center">
                         <i class="fas fa-lock text-white text-6xl opacity-80"></i>
                     </div>
                 @endif

                 <!-- Category Name -->
                 <h2 class="text-2xl font-semibold text-center mb-4 relative z-10">{{ $category->name }}</h2>
             </a>
            @endforeach
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

    <script>
function handleCategoryClick(event, isUnlocked) {
    console.log("Category unlocked status:", isUnlocked); // Log category status
    console.log("Type of isUnlocked:", typeof isUnlocked); // Check if it's a string

    if (isUnlocked === 'false') {
        console.log('Locked category clicked'); // Log locked click
        event.preventDefault();  // Prevent navigation
        alert('You must complete previous categories to unlock this one.');
    } else if (isUnlocked === 'true') {
        console.log('Category is unlocked, proceeding...'); // Log unlocked category
    } else {
        console.log('Unexpected value for isUnlocked:', isUnlocked);
    }
}


    </script>
</x-app-layout>

<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ route('modules') }}" class="text-blue-600 hover:text-blue-800 flex items-center gap-2 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Modules
                </a>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $module->title }}</h1>
                <div class="flex items-center gap-4 text-sm text-gray-500">
                    <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-lg font-medium">{{ $module->category }}</span>
                    <span>{{ $module->duration_minutes }} min</span>
                    <span>{{ $module->exercises_count }} exercises</span>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 mb-8">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Overview</h2>
                <p class="text-gray-600 leading-relaxed mb-6">{{ $module->description }}</p>
                
                <h2 class="text-xl font-bold text-gray-900 mb-4">Exercises</h2>
                <div class="space-y-4">
                    @for ($i = 1; $i <= $module->exercises_count; $i++)
                    <div class="border border-gray-200 rounded-xl p-4 hover:bg-gray-50 transition-colors">
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold flex-shrink-0">
                                {{ $i }}
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">Exercise {{ $i }}</h3>
                                <p class="text-gray-600 text-sm">
                                    @if($i == 1)
                                        Introduction and key concepts. Read through the material and reflect on how it applies to your situation.
                                    @elseif($i == 2)
                                        Guided practice. Follow the steps to engage with the core technique of this module.
                                    @else
                                        Application and review. Apply what you've learned to a real-life scenario.
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>

            <div class="flex justify-end">
                <form action="{{ route('modules.complete', $module->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="px-6 py-3 bg-green-600 text-white font-bold rounded-xl shadow-lg hover:bg-green-700 transition-all transform hover:scale-105 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Mark as Completed
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

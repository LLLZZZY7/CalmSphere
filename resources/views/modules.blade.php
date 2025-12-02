<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-2">Interactive Modules</h1>
                <p class="text-gray-500">Guided exercises and lessons to support your mental wellness journey</p>
            </div>

            <!-- Progress Banner -->
            <div class="bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl p-8 mb-8 text-white shadow-lg relative overflow-hidden">
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-2">
                        <h2 class="text-xl font-bold">Your Progress</h2>
                        <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-blue-50 mb-6">{{ $completedModules }} of {{ $totalModules }} modules completed</p>
                    
                    <div class="w-full bg-black/20 rounded-full h-2 mb-2">
                        <div class="bg-white h-2 rounded-full transition-all duration-1000" style="width: {{ $progressPercentage }}%"></div>
                    </div>
                    <p class="text-sm text-blue-50">{{ round($progressPercentage) }}% complete</p>
                </div>
                
                <!-- Decorative Circles -->
                <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 -ml-16 -mb-16 w-48 h-48 bg-white/10 rounded-full blur-2xl"></div>
            </div>

            <!-- Modules Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($modules as $module)
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow border border-gray-100 flex flex-col h-full">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center text-white
                            @if($module->category == 'Anxiety') bg-blue-500
                            @elseif($module->category == 'Stress Relief') bg-green-500
                            @elseif($module->category == 'Mindfulness') bg-purple-500
                            @else bg-orange-500
                            @endif">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-xs font-semibold px-2 py-1 bg-gray-100 text-gray-600 rounded-lg">{{ $module->category }}</span>
                    </div>

                    <h3 class="font-bold text-gray-900 text-lg mb-2">{{ $module->title }}</h3>
                    <p class="text-gray-600 text-sm mb-6 flex-grow">{{ $module->description }}</p>

                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-6">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $module->duration_minutes }} min
                        </div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            {{ $module->exercises_count }} exercises
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-gray-50">
                        <a href="{{ route('modules.show', $module->id) }}" class="w-full py-2 border border-green-500 text-green-600 font-semibold rounded-lg hover:bg-green-50 transition-colors flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Review Module
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

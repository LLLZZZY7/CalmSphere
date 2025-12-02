<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-blue-400 to-purple-400 rounded-3xl p-8 mb-8 text-white shadow-lg">
                <h1 class="text-3xl font-bold mb-2">Welcome back, {{ Auth::user()->name }}!</h1>
                <p class="text-blue-50 text-lg">You're doing great! Keep up your mental wellness journey.</p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Streak -->
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center text-blue-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <div class="text-2xl font-bold text-gray-900 mb-1">{{ $streak }} days</div>
                    <div class="text-sm text-gray-500">Current Streak</div>
                </div>

                <!-- Mood Entries -->
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center text-purple-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div class="text-2xl font-bold text-gray-900 mb-1">{{ $moodEntriesCount }}</div>
                    <div class="text-sm text-gray-500">Mood Entries</div>
                </div>

                <!-- Community Posts -->
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center text-green-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div class="text-2xl font-bold text-gray-900 mb-1">{{ $communityPostsCount }}</div>
                    <div class="text-sm text-gray-500">Community Posts</div>
                </div>

                <!-- Modules Completed -->
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-10 h-10 bg-orange-100 rounded-xl flex items-center justify-center text-orange-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="text-2xl font-bold text-gray-900 mb-1">{{ $modulesCompletedCount }}/12</div>
                    <div class="text-sm text-gray-500">Modules Completed</div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Upcoming Sessions -->
                <div class="bg-white rounded-2xl p-6 shadow-sm">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-bold text-gray-900">Upcoming Sessions</h2>
                        <a href="#" class="text-sm text-blue-500 hover:text-blue-600 font-medium">View All</a>
                    </div>
                    <div class="space-y-4">
                        @foreach($upcomingSessions as $session)
                        <div class="flex items-center justify-between p-4 bg-blue-50 rounded-xl">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-blue-200 rounded-full flex items-center justify-center text-blue-600 font-bold text-lg">
                                    {{ substr($session->therapist->name, 4, 1) }}
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900">{{ $session->therapist->name }}</h3>
                                    <p class="text-sm text-gray-500">{{ $session->therapist->specialties[0] ?? 'Therapist' }}</p>
                                    <div class="flex items-center gap-2 mt-1 text-sm text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ $session->appointment_time->format('D, h:i A') }}
                                    </div>
                                </div>
                            </div>
                            <button class="px-4 py-2 bg-white text-blue-600 text-sm font-semibold rounded-lg shadow-sm hover:bg-gray-50">
                                Video Call
                            </button>
                        </div>
                        @endforeach
                        
                        @if($upcomingSessions->isEmpty())
                            <p class="text-gray-500 text-center py-4">No upcoming sessions.</p>
                        @endif
                    </div>
                </div>

                <!-- Recent Moods -->
                <div class="bg-white rounded-2xl p-6 shadow-sm">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-bold text-gray-900">Recent Moods</h2>
                        <a href="#" class="text-sm text-blue-500 hover:text-blue-600 font-medium">Track Mood</a>
                    </div>
                    <div class="space-y-4">
                        @foreach($recentMoods as $mood)
                        <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl">
                            <div class="text-2xl">
                                @if($mood->mood_score >= 4) 🤩
                                @elseif($mood->mood_score == 3) 🙂
                                @else 😔
                                @endif
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">
                                    @if($mood->created_at->isToday()) Today
                                    @elseif($mood->created_at->isYesterday()) Yesterday
                                    @else {{ $mood->created_at->diffForHumans() }}
                                    @endif
                                </h3>
                                <p class="text-sm text-gray-500">{{ $mood->description }}</p>
                            </div>
                        </div>
                        @endforeach

                        @if($recentMoods->isEmpty())
                            <p class="text-gray-500 text-center py-4">No mood entries yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

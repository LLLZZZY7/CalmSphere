<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Mood Tracker</h1>

            <!-- Mood Scale (Top) -->
            <div class="bg-white rounded-2xl p-6 shadow-sm mb-8">
                <h2 class="text-lg font-bold text-gray-900 mb-4">How are you feeling today?</h2>
                <div class="flex justify-between gap-4">
                    <form action="{{ route('mood-tracker.store') }}" method="POST" class="contents">
                        @csrf
                        <input type="hidden" name="mood_score" value="1">
                        <button type="submit" class="flex-1 flex flex-col items-center gap-2 p-4 rounded-xl hover:bg-red-50 transition-colors group">
                            <div class="text-4xl transform group-hover:scale-110 transition-transform">😔</div>
                            <span class="text-sm font-medium text-gray-600">Terrible</span>
                        </button>
                    </form>
                    <form action="{{ route('mood-tracker.store') }}" method="POST" class="contents">
                        @csrf
                        <input type="hidden" name="mood_score" value="2">
                        <button type="submit" class="flex-1 flex flex-col items-center gap-2 p-4 rounded-xl hover:bg-orange-50 transition-colors group">
                            <div class="text-4xl transform group-hover:scale-110 transition-transform">😐</div>
                            <span class="text-sm font-medium text-gray-600">Bad</span>
                        </button>
                    </form>
                    <form action="{{ route('mood-tracker.store') }}" method="POST" class="contents">
                        @csrf
                        <input type="hidden" name="mood_score" value="3">
                        <button type="submit" class="flex-1 flex flex-col items-center gap-2 p-4 rounded-xl hover:bg-yellow-50 transition-colors group">
                            <div class="text-4xl transform group-hover:scale-110 transition-transform">🙂</div>
                            <span class="text-sm font-medium text-gray-600">Okay</span>
                        </button>
                    </form>
                    <form action="{{ route('mood-tracker.store') }}" method="POST" class="contents">
                        @csrf
                        <input type="hidden" name="mood_score" value="4">
                        <button type="submit" class="flex-1 flex flex-col items-center gap-2 p-4 rounded-xl hover:bg-blue-50 transition-colors group">
                            <div class="text-4xl transform group-hover:scale-110 transition-transform">😊</div>
                            <span class="text-sm font-medium text-gray-600">Good</span>
                        </button>
                    </form>
                    <form action="{{ route('mood-tracker.store') }}" method="POST" class="contents">
                        @csrf
                        <input type="hidden" name="mood_score" value="5">
                        <button type="submit" class="flex-1 flex flex-col items-center gap-2 p-4 rounded-xl hover:bg-green-50 transition-colors group">
                            <div class="text-4xl transform group-hover:scale-110 transition-transform">🤩</div>
                            <span class="text-sm font-medium text-gray-600">Great</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- History -->
            <div class="bg-white rounded-2xl p-6 shadow-sm mb-8">
                <h2 class="text-lg font-bold text-gray-900 mb-6">History</h2>
                <div class="space-y-4">
                    @foreach($recentMoods as $mood)
                    <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center text-2xl bg-white shadow-sm">
                            @if($mood->mood_score >= 4) 🤩
                            @elseif($mood->mood_score == 3) 🙂
                            @elseif($mood->mood_score == 2) 😐
                            @else 😔
                            @endif
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-1">
                                <h3 class="font-bold text-gray-900">
                                    @if($mood->mood_score >= 4) Great
                                    @elseif($mood->mood_score == 3) Good
                                    @elseif($mood->mood_score == 2) Okay
                                    @else Bad
                                    @endif
                                </h3>
                                <span class="text-sm text-gray-500">{{ $mood->created_at->format('M d, Y • h:i A') }}</span>
                            </div>
                            <p class="text-gray-600">{{ $mood->description }}</p>
                        </div>
                    </div>
                    @endforeach

                    @if($recentMoods->isEmpty())
                        <p class="text-gray-500 text-center py-4">No mood entries found.</p>
                    @endif

                    <div class="mt-4">
                        {{ $recentMoods->links() }}
                    </div>
                </div>
            </div>

            <!-- Trend Graph (Bottom) -->
            <div class="bg-white rounded-2xl p-6 shadow-sm">
                <h2 class="text-lg font-bold text-gray-900 mb-4">Weekly Trend</h2>
                <div class="flex items-end justify-between h-64 px-4 pb-4 border-b border-gray-100">
                    @foreach($graphData as $data)
                    <div class="flex flex-col items-center gap-2 w-full group relative">
                        <!-- Tooltip -->
                        <div class="absolute bottom-full mb-2 hidden group-hover:block bg-gray-800 text-white text-xs rounded py-1 px-2 z-10">
                            Score: {{ $data['score'] }} ({{ $data['date'] }})
                        </div>
                        
                        <!-- Bar -->
                        <div class="w-8 bg-blue-100 rounded-t-lg relative overflow-hidden transition-all duration-500 hover:bg-blue-200" style="height: {{ $data['score'] * 20 }}%;">
                            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-blue-400 to-purple-400 opacity-80" style="height: 100%"></div>
                        </div>
                        
                        <!-- Label -->
                        <span class="text-xs text-gray-500 font-medium">{{ $data['day'] }}</span>
                    </div>
                    @endforeach
                </div>
                <div class="flex justify-between mt-2 text-xs text-gray-400 px-4">
                    <span>1 - Very Low</span>
                    <span>5 - Excellent</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

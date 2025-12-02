<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 mb-2">Community</h1>
                    <p class="text-gray-500">Connect, share, and grow with others on the same journey</p>
                </div>
                <button class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-sm hover:bg-blue-700 transition-colors">
                    New Post
                </button>
            </div>

            <!-- Guidelines Banner -->
            <div class="bg-blue-50 border border-blue-100 rounded-xl p-6 mb-8">
                <div class="flex items-start gap-4">
                    <div class="p-2 bg-blue-100 rounded-lg text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-1">Community Guidelines</h3>
                        <p class="text-gray-600 text-sm">This is a safe space. Be kind, respectful, and supportive. All posts are anonymous to protect privacy.</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Feed -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Share Input -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4">Share with the Community</h3>
                        <form action="{{ route('community.store') }}" method="POST">
                            @csrf
                            <textarea name="content" class="w-full bg-gray-50 border-transparent rounded-xl p-4 text-sm focus:border-blue-500 focus:bg-white focus:ring-0 transition-colors mb-4" rows="3" placeholder="What's on your mind? Share your thoughts, ask for support, or offer encouragement..." required></textarea>
                            
                            <div class="flex flex-wrap gap-2 mb-4">
                                <label class="cursor-pointer">
                                    <input type="radio" name="category" value="Support Needed" class="peer sr-only">
                                    <span class="px-3 py-1 bg-gray-100 peer-checked:bg-blue-100 peer-checked:text-blue-600 rounded-full text-xs font-medium text-gray-600 transition-colors">Support Needed</span>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="category" value="Success Stories" class="peer sr-only">
                                    <span class="px-3 py-1 bg-gray-100 peer-checked:bg-green-100 peer-checked:text-green-600 rounded-full text-xs font-medium text-gray-600 transition-colors">Success Stories</span>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="category" value="Tips & Advice" class="peer sr-only">
                                    <span class="px-3 py-1 bg-gray-100 peer-checked:bg-purple-100 peer-checked:text-purple-600 rounded-full text-xs font-medium text-gray-600 transition-colors">Tips & Advice</span>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="category" value="Motivation" class="peer sr-only">
                                    <span class="px-3 py-1 bg-gray-100 peer-checked:bg-orange-100 peer-checked:text-orange-600 rounded-full text-xs font-medium text-gray-600 transition-colors">Motivation</span>
                                </label>
                            </div>

                            <button type="submit" class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow-sm transition-colors flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                                Post Anonymously
                            </button>
                        </form>
                    </div>

                    <h3 class="font-bold text-gray-900 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        Recent Posts
                    </h3>

                    @foreach($posts as $post)
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 font-bold">
                                    AU
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900">Anonymous User</h3>
                                    <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                            </button>
                        </div>

                        @if($post->category)
                        <div class="mb-3">
                            <span class="px-2 py-1 bg-blue-50 text-blue-600 rounded text-xs font-bold uppercase tracking-wide">{{ $post->category }}</span>
                        </div>
                        @endif

                        <p class="text-gray-700 mb-4">{{ $post->content }}</p>

                        <div class="flex items-center gap-6 pt-4 border-t border-gray-50">
                            <button class="flex items-center gap-2 text-gray-500 hover:text-red-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                <span class="text-sm">{{ $post->likes }}</span>
                            </button>
                            <button class="flex items-center gap-2 text-gray-500 hover:text-blue-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                <span class="text-sm">{{ $post->comments_count }}</span>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4">Trending Topics</h3>
                        <div class="space-y-3">
                            <a href="#" class="block text-gray-600 hover:text-blue-600 text-sm font-medium">#AnxietyRelief</a>
                            <a href="#" class="block text-gray-600 hover:text-blue-600 text-sm font-medium">#DailyMeditation</a>
                            <a href="#" class="block text-gray-600 hover:text-blue-600 text-sm font-medium">#SleepHygiene</a>
                            <a href="#" class="block text-gray-600 hover:text-blue-600 text-sm font-medium">#PositiveVibes</a>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-2xl p-6 text-white shadow-lg">
                        <h3 class="font-bold text-lg mb-2">Need immediate help?</h3>
                        <p class="text-purple-100 text-sm mb-4">Our crisis counselors are available 24/7.</p>
                        <button class="w-full py-2 bg-white text-purple-600 font-bold rounded-lg hover:bg-purple-50 transition-colors">
                            Get Help Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</x-app-layout>

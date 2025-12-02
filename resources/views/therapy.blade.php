<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-2">Find Your Therapist</h1>
                <p class="text-gray-500">Connect with licensed mental health professionals who can help you on your journey</p>
            </div>

            <!-- Verified Banner -->
            <div class="bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl p-6 mb-8 text-white flex items-start gap-4 shadow-lg">
                <div class="p-2 bg-white/20 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-lg mb-1">All Therapists Are Verified</h3>
                    <p class="text-blue-50 text-sm opacity-90">Every therapist on our platform is licensed, insured, and has undergone thorough background checks. Your safety and privacy are our top priorities.</p>
                </div>
            </div>

            <!-- Therapists Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($therapists as $therapist)
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                    <div class="flex items-start gap-4 mb-6">
                        <img src="{{ $therapist->image_url }}" alt="{{ $therapist->name }}" class="w-16 h-16 rounded-xl object-cover bg-gray-200">
                        <div>
                            <h3 class="font-bold text-gray-900 text-lg">{{ $therapist->name }}</h3>
                            <div class="flex items-center gap-2 text-sm mb-1">
                                <div class="flex items-center text-yellow-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <span class="text-gray-900 font-bold ml-1">{{ $therapist->rating }}</span>
                                </div>
                                <span class="text-gray-400">•</span>
                                <span class="text-gray-500">{{ $therapist->review_count }} reviews</span>
                            </div>
                            <div class="flex items-center text-gray-500 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $therapist->location }}
                            </div>
                        </div>
                    </div>

                    <p class="text-gray-600 mb-6 text-sm leading-relaxed">
                        {{ $therapist->title }} with {{ $therapist->experience_years }}+ years of experience helping individuals overcome {{ strtolower($therapist->specialties[0]) }}.
                    </p>

                    <div class="space-y-3 mb-6">
                        <div class="flex items-center text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $therapist->experience_years }} years experience
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{ $therapist->availability }}
                        </div>
                        <div class="flex flex-wrap gap-2 mt-2">
                            @foreach($therapist->specialties as $specialty)
                            <span class="px-2 py-1 bg-blue-50 text-blue-600 rounded text-xs font-medium">{{ $specialty }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-50">
                        <div>
                            <span class="text-2xl font-bold text-gray-900">${{ $therapist->price_per_session }}</span>
                            <span class="text-gray-500 text-sm">/ session</span>
                        </div>
                        <form action="{{ route('therapy.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="therapist_id" value="{{ $therapist->id }}">
                            <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-sm hover:bg-blue-700 transition-colors">
                                Book Session
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

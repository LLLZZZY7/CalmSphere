<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mood;
use Carbon\Carbon;

class MoodTrackerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Fetch last 7 days for the graph
        $endDate = now();
        $startDate = now()->subDays(6);
        
        $moods = Mood::where('user_id', $user->id)
            ->whereBetween('created_at', [$startDate->startOfDay(), $endDate->endOfDay()])
            ->orderBy('created_at')
            ->get();

        // Prepare data for the graph
        $graphData = [];
        for ($i = 0; $i < 7; $i++) {
            $date = $startDate->copy()->addDays($i);
            $mood = $moods->filter(function ($m) use ($date) {
                return $m->created_at->isSameDay($date);
            })->last(); // Take the last mood of the day

            $graphData[] = [
                'day' => $date->format('D'),
                'score' => $mood ? $mood->mood_score : 0,
                'date' => $date->format('M d'),
            ];
        }

        $recentMoods = Mood::where('user_id', $user->id)
            ->latest()
            ->paginate(10);

        return view('mood-tracker', compact('graphData', 'recentMoods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mood_score' => 'required|integer|min:1|max:5',
        ]);

        Mood::create([
            'user_id' => Auth::id(),
            'mood_score' => $request->mood_score,
            'description' => 'Feeling ' . $this->getMoodLabel($request->mood_score),
        ]);

        return redirect()->back()->with('success', 'Mood tracked successfully!');
    }

    private function getMoodLabel($score)
    {
        return match ($score) {
            1 => 'Terrible',
            2 => 'Bad',
            3 => 'Okay',
            4 => 'Good',
            5 => 'Great',
            default => 'Unknown',
        };
    }
}

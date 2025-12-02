<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Module;
use App\Models\UserModule;

class ModulesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $modules = Module::all();
        
        // Calculate progress
        $totalModules = $modules->count();
        $completedModules = UserModule::where('user_id', $user->id)
            ->where('status', 'completed')
            ->count();
            
        $progressPercentage = $totalModules > 0 ? ($completedModules / $totalModules) * 100 : 0;

        return view('modules', compact('modules', 'totalModules', 'completedModules', 'progressPercentage'));
    }

    public function show($id)
    {
        $module = Module::findOrFail($id);
        return view('module-show', compact('module'));
    }

    public function complete($id)
    {
        $user = Auth::user();
        
        UserModule::firstOrCreate(
            ['user_id' => $user->id, 'module_id' => $id],
            ['status' => 'completed', 'completed_at' => now()]
        );

        return redirect()->route('modules')->with('success', 'Module completed successfully!');
    }
}

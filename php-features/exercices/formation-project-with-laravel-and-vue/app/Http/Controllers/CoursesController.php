<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CoursesController extends Controller
{
    protected function index() {
        $courses = Course::with('user')->withCount('episodes')->get();

        return Inertia::render('Courses/index', [
            'courses' => $courses
        ]);
    }

    protected function show($course){
        $course = Course::where('id', $course)->with('episodes')->first();
        $watched = auth()->user()->episodes;

        return Inertia::render('Courses/show', [
            'course' => $course,
            'watched' => $watched
        ]);
    }

    protected function progress(Request $request){
        $id = $request->input('episode');
        $user = auth()->user(); // recover the connect user

        $user->episodes()->toggle($id);

        return $user->episodes;
    }
}

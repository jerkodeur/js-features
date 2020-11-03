<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CoursesController extends Controller
{
    protected function index() {
        $courses = Course::all();

        return Inertia::render('Courses/index', [
            'courses' => $courses
        ]);
    }
}
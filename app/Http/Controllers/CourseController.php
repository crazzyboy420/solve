<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Platform;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show($id) {
        $course = Course::with('platform', 'topics', 'series')->findOrFail($id);
        return $course;
    }
}

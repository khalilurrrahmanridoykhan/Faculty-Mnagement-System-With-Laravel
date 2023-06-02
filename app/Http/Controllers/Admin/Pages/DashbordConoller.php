<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseFacultyAssignment;
use App\Models\Faculty;
use App\Models\ParalalCourse;
use App\Models\Section;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class DashbordConoller extends Controller
{
    public function dashbord(){

        $facultycount = Faculty::count();
        $coursecount = Course::count();
        $sectioncount = Section::count();
        $paralacount = ParalalCourse::count();
        $assignmentcount = CourseFacultyAssignment::count();
        $timeslotcount = TimeSlot::count();

        $data['facultycount'] = $facultycount;
        $data['coursecount'] = $coursecount;
        $data['sectioncount'] = $sectioncount;
        $data['paralacount'] = $paralacount;
        $data['assignmentcount'] = $assignmentcount;
        $data['timeslotcount'] = $timeslotcount;

        return view('admin.pages.dashbord.index', $data);
    }
}

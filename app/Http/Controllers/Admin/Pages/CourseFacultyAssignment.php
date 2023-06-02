<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseFacultyAssignment as ModelsCourseFacultyAssignment;
use App\Models\Faculty;
use App\Models\FacultySection;
use App\Models\Section;
use App\Models\TimeSlot;
use App\Models\UniOtherInfo;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseFacultyAssignment extends Controller
{
    //show all assignment
    public function index(Request $request)
    {
        // $assignment = ModelsCourseFacultyAssignment::orderBy('created_at', 'DESC');

        $assignment = DB::table('course_faculty_assignments')
            ->select('courses.courses_code', 'faculties.intal', 'sections.Section_no', 'time_slots.time', 'time_slots.day', 'time_slots.room_no_for_class', 'course_faculty_assignments.status', 'course_faculty_assignments.course_faculty_assignments_id','course_faculty_assignments.created_at')
            ->leftJoin('courses', 'courses_id', 'course_faculty_assignments.course')
            ->leftJoin('faculties', 'faculties_id', 'course_faculty_assignments.faculty')
            ->leftJoin('sections', 'sections_id', 'course_faculty_assignments.Section')
            ->leftJoin('time_slots', 'time_slots_id', 'course_faculty_assignments.time')
            ->orderBy('created_at','DESC')
            ->get();

        // dd($assignment);

        if (!empty($request->keyword)) {
            $assignment = $assignment->where('name', 'like', '%' . $request->keyword . '%');
        }

        // $assignment = $assignment->paginate(15);

        $data['assignment'] = $assignment;

        return view('admin.pages.assignment.assignmentlist', $data);
    }

    public function create(Request $request)
    {
        $course = Course::orderBy('created_at', 'ASC')->get();

        $section = Section::orderBy('created_at', 'ASC')->get();

        $faculty = Faculty::orderBy('created_at', 'ASC')->get();

        $time_slot = TimeSlot::orderBy('created_at', 'ASC')->get();

        $uni_other_info = UniOtherInfo::orderBy('created_at', 'ASC')->get();

        $faculty_section = FacultySection::orderBy('created_at', 'ASC')->get();
        // $faclutydata = DB::table('faculty_sections')->first();
        // dd($faclutydata->courses_code);

        $data['course'] = $course;
        $data['section'] = $section;
        $data['faculty'] = $faculty;
        $data['time_slot'] = $time_slot;
        $data['uni_other_info'] = $uni_other_info;
        $data['faculty_section'] = $faculty_section;

        return view('admin.pages.assignment.assignmentinput', $data);
    }

    // public function save(Request $request)
    // {
    //     echo '<pre>';
    //     print_r($request->all());
    // }

    public function savefaculrysection(Request $request)
    {
        $faculty_section = new FacultySection();
        $faculty_section->courses_code = $request->courses_code;
        $faculty_section->Section_no = $request->Section_no;
        $faculty_section->faculties_id = $request->faculties_id;
        $faculty_section->iffacultysectionunice = $request->iffacultysectionunice;
        $faculty_section->save();

        // $request->session()->get('success', 'assignment Created Successfully.');
        // session()->flash('success', 'Task was successful!');

        return response()->json([
            'status' => 200,
            'message' => 'facultyCourse Created Successfully.',
        ]);
    }
    public function save(Request $request)
    {
        $validator = validator($request->all(), [
            // 'year' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $assignment = new ModelsCourseFacultyAssignment();
            $assignment->course = $request->course;
            $assignment->Section = $request->Section;
            $assignment->faculty = $request->faculty;
            $assignment->time = $request->time;
            $assignment->day = $request->day;
            $assignment->room_no_for_class = $request->room_no_for_class;
            $assignment->year = $request->year;
            $assignment->semester = $request->semester;
            $assignment->iffacultyisunice = $request->iffacultyisunice;
            $assignment->status = $request->status;
            $assignment->save();

            $request->session()->get('success', 'assignment Created Successfully.');
            session()->flash('success', 'Task was successful!');

            return response()->json([
                'status' => 200,
                'message' => 'assignment Created Successfully.',
            ]);
            // $coursecrdit = DB::table('course_faculty_assignments')
            //     ->select('courses.credit', 'course_faculty_assignments.*')
            //     ->leftJoin('courses', 'courses_id', 'course_faculty_assignments.course')
            //     ->where('course', $request->course)
            //     ->first();

            // $faclutycridit = DB::table('course_faculty_assignments')
            //     ->select('faculties.tacken_credit', 'course_faculty_assignments.*')
            //     ->leftJoin('faculties', 'faculties_id', 'course_faculty_assignments.faculty')
            //     // ->where('course',$request->course)
            //     ->get();

            // return response()->json($faclutycridit, 200);
        }
    }

    public function edit($id, Request $request)
    {
        $assignment = ModelsCourseFacultyAssignment::where('faculties_id', $id)->first();

        if (empty($assignment)) {
            return redirect()->route('admin.assignment.index');
        }

        $data['assignment'] = $assignment;

        return view('admin.pages.assignment.assignmentedit', $data);
    }
    public function update($id, Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $assignment = ModelsCourseFacultyAssignment::find($id);

            if (empty($assignment)) {
                return response()->json([
                    'status' => 0,
                ]);
            }

            $assignment->name = $request->name;
            $assignment->intal = $request->intal;
            $assignment->postion = $request->postion;
            $assignment->email = $request->email;
            $assignment->phone_ext = $request->phone_ext;
            $assignment->room_no = $request->room_no;
            $assignment->Mobile_number = $request->Mobile_number;
            $assignment->status = $request->status;
            $assignment->save();
        }
    }
    public function delete($id, Request $request)
    {

        $coursecrdit = DB::table('course_faculty_assignments')
            ->where('course_faculty_assignments_id', $id)
            ->first();
        // dd($coursecrdit->course);
        $getcoursedata = $coursecrdit->course;
        $getfaclutyid = $coursecrdit->faculty;
        $getcoursecrdit = DB::table('courses')->where('courses_id', $getcoursedata)->first();
        $gettedcoursecedit = $getcoursecrdit->credit;

        $facultycrditupdate = DB::table('faculties')->where('faculties_id', $getfaclutyid)->first();
        $facultyceidtold = $facultycrditupdate->tacken_credit;
        $finalfaclulycridit = $facultyceidtold -  $gettedcoursecedit;

        $facultycrditupdatemain = Faculty::find($getfaclutyid);

        if (empty($facultycrditupdate)) {
            return response()->json([
                'status' => 0,
                'message' => 'its empty.',
            ]);
        }
        $facultycrditupdatemain->tacken_credit =  $finalfaclulycridit;
        $facultycrditupdatemain->save();

        $assignment = ModelsCourseFacultyAssignment::where('course_faculty_assignments_id', $id)->delete();

        if (empty($assignment)) {
            return redirect()->route('admin.assignment.index');
        } else {
            return redirect()->route('admin.assignment.index');
        }
    }

    public function timeslotdataget(Request $request)
    {
        $gettimeslot = TimeSlot::where('time_slots_id', $request->id)->first();

        // return Response::json($gettimeslot);
        return response()->json($gettimeslot, 200);
    }

    public function getsectionfacluty(Request $request)
    {
        $getsectionfaclulty = FacultySection::get();

        // return Response::json($gettimeslot);
        return response()->json($getsectionfaclulty, 200);
    }

    public function checkthecriditlessthe11(Request $request)
    {
        // $coursecrditcoursecrdit = DB::table('course_faculty_assignments')
        // ->select('courses.credit', 'course_faculty_assignments.*')
        // ->leftJoin('courses','courses_id','course_faculty_assignments.course')
        // ->where('course',$request->course)
        // ->first();

        $coursecrdit = DB::table('courses')
            ->where('courses_id', $request->courses_code)
            ->first();

        $faclultycreidit = DB::table('faculties')
            ->where('faculties_id', $request->faculties_id)
            ->first();

        $courseceditspicefiy = $coursecrdit->credit;
        $faclultycreiditspicefiy = $faclultycreidit->tacken_credit;

        $totalcriditforfaculty = $faclultycreiditspicefiy + $courseceditspicefiy;

        if ($totalcriditforfaculty < 12.0) {
            $facultycrditupdate = Faculty::find($request->faculties_id);

            if (empty($facultycrditupdate)) {
                return response()->json([
                    'status' => 0,
                    'message' => 'its empty.',
                ]);
            }
            $facultycrditupdate->tacken_credit = $totalcriditforfaculty;
            $facultycrditupdate->save();
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'you are try to more then 11.',
            ]);
        }

        // return response()->json($totalcriditforfaculty, 200);
    }
}

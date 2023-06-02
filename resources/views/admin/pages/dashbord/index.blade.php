@extends('admin.layouts2.adminapp')


@section('content')
    <div class="content-wrapper">
        <div class=" ml-1 row">

            <div class="parent col-md-3">
                <div class="child">
                    <h1 class="textfordeshbor">{{ $facultycount }}</h1>
                    {{-- <i class="fa-solid fa-chalkboard-user fa-3x iconclassfordashbord"></i> --}}
                    <h4 class="h3 textfordeshbor">FACULTY</h4>
                    <a href="{{ route('admin.faculty.index') }}">
                        <span class="link"></span>
                      </a>
                </div>
              </div>

              <div class="parent col-md-3">
                <div class="child">
                    {{-- <i class="fa-solid fa-book-open fa-3x iconclassfordashbord"></i> --}}
                    <h1 class="textfordeshbor">{{ $coursecount }}</h1>
                    <h4 class="h3 textfordeshbor">Courses</h4>
                    <a href="{{ route('admin.course.index') }}">
                        <span class="link"></span>
                      </a>
                </div>
              </div>


              <div class="parent col-md-3">
                <div class="child">
                    {{-- <i class="fa-solid fa-inbox fa-3x iconclassfordashbord"></i> --}}
                    <h1 class="textfordeshbor">{{ $paralacount }}</h1>
                    <h4 class="h3 textfordeshbor">P Courses</h4>
                    <a href="{{ route('admin.paralacourse.index') }}">
                        <span class="link"></span>
                      </a>
                </div>
              </div>

              <div class="parent col-md-3">
                <div class="child">
                    {{-- <i class="fa-solid fa-users-rectangle fa-3x iconclassfordashbord"></i> --}}
                    <h1 class="textfordeshbor">{{ $sectioncount }}</h1>
                    <h4 class="h3 textfordeshbor">Section</h4>
                    <a href="{{ route('admin.section.index') }}">
                        <span class="link"></span>
                      </a>
                </div>
              </div>
              <div class="parent col-md-3">
                <div class="child">
                    {{-- <i class="fa-solid fa-address-card fa-3x iconclassfordashbord"></i> --}}
                    <h1 class="textfordeshbor">{{ $assignmentcount }}</h1>
                    <h4 class="h3 textfordeshbor">ASSIGNMENT</h4>
                    <a href="{{ route('admin.assignment.index') }}">
                        <span class="link"></span>
                      </a>
                </div>
              </div>
              <div class="parent col-md-3">
                <div class="child">
                    {{-- <i class="fa-solid fa-calendar-days fa-3x iconclassfordashbord"></i> --}}
                    <h1 class="textfordeshbor">{{ $timeslotcount }}</h1>
                    <h4 class="h3 textfordeshbor">TIME SLOT</h4>
                    <a href="{{ route('admin.timeslot.index') }}">
                        <span class="link"></span>
                      </a>
                </div>
              </div>


        </div>
    </div>
@endsection

<div class="modal fade" id="studentCourseStatusModal" tabindex="-1" role="dialog" aria-labelledby="studentCourseStatusModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" >
                <h5 class="modal-title" id="modalTitle" style="font-weight: 700; color; black;">Student Courses</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="studentCourseStatusModalForm" class="save-student-courses" action="{{ route('save.student.courses') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $id }}">
                    <div class="row pl-2 pr-2 mb-1" style="font-size: 14px; font-weight: 700; color; black;">
                        <div class="col-md-8">Course Name</div>
                        <div class="col-md-4 text-center">Unlock</div>
                    </div>
                    <hr class="pl-2 pr-2">
                    @foreach ($courses as $course)
                        <div class="row pl-2 pr-2 mb-1" style="font-size: 14px; font-weight: 600;">
                            <div class="col-md-8">
                                {{ $course->course_title }}
                            </div>
                            <div class="col-md-4 text-center">
                                <input type="checkbox" name="courses[]" value="{{ $course->id }}" style="width: 16px; height: 16px; border-radius: 10px;"{{ in_array($course->id, $studentCourses) ? 'checked' : '' }}>
                            </div>
                        </div>
                    @endforeach
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
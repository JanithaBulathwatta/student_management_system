@extends('layout.master')

@section('content')

    <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form id="frmAddStudent">
                <input type="hidden" value="" id="hdnStuId" name="hdnStuId">
                <input type="hidden" value="" id="hdnStuName" name="hdnStuName">
                <input type="hidden" value="" id="hdnStuGrade" name="hdnStuGrade">
                <input type="hidden" value="" id="hdnStuStream" name="hdnStuStream">
                <div class="row g-3">
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="student ID" name="txtStuId" id="txtStuId">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="name" name="txtName" id="txtName">
                    </div>
                </div>

                <div class="row g-3 mt-2">
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="Grade" name="txtGrade" id="txtGrade">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="Stream" name="textStram" id="textStram">
                    </div>
                </div>

                <div class="col-3 mt-5">
                    <button type="submit" class="btn btn-primary" name="btnAdd" id="btnAdd">add student</button>
                </div>

            </form>

        </div>

        <div class="card-body mt-5">
                    <div class="row">
                        <div class="table-responsive-wrapper">
                            <table class="table table-striped table-bordered mt-5" id="tblStudentDetails" style="border-top: 1px solid #dee2e6 !important;border-collapse: collapse !important;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student id</th>
                                    <th>name</th>
                                    <th>Grade</th>
                                    <th>Stream</th>
                                    @can('student_manage')
                                        <th>action</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                <!-- Table content will be added dynamically -->
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-end" style="">
                           <div id="excelExportBtnContainer"></div>
                        </div>
                    </div>
                </div>
    </div>

    <div class="modal" tabindex="-1" style="display:none" id="ModelUpdateStudent">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">update student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="frmUpdateStu">
                <div class="row g-3">
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="student ID" name="txtUpdateStuId" id="txtUpdateStuId">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="name" name="txtUpdateName" id="txtUpdateName">
                    </div>
                </div>

                <div class="row g-3 mt-2">
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="Grade" name="txtUpdateGrade" id="txtUpdateGrade">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="Stream" name="textUpdateStram" id="textUpdateStram">
                    </div>
                </div>

                <div class="col-3 mt-5">
                    <button type="submit" class="btn btn-primary" name="btnUpdateStudent" id="btnUpdateStudent">Update student</button>
                </div>

            </form>
      </div>
    </div>
  </div>
</div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">
            Logout
        </button>
    </form>

</div>

@endsection

@section('customJS')
    <script>window.userRole = "{{ auth()->user()->role }}" </script>
    <script src="{{ asset('controllers/student-creation.js') }}?v={{ filemtime(public_path('controllers/student-creation.js')) }}"></script>
@endsection



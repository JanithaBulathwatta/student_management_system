@extends('layout.master')

@section('content')

    <div class="card-body mt-5 col-lg-8 mx-auto mb-5">
        <div class="row">
            <div class="table-responsive-wrapper">
                <table class="table table-striped table-bordered mt-5" id="tblUserDetails"
                    style="border-top: 1px solid #dee2e6 !important;border-collapse: collapse !important;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>user name</th>
                            <th>email</th>
                            <th>role</th>
                            <th>Action</th>
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
    </div>
@endsection

@section('customJS')
    <script src="{{ asset('controllers/supremeAdmin.js') }}?v={{ filemtime(public_path('controllers/supremeAdmin.js')) }}"></script>
@endsection

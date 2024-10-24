@extends('admin.template')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Templates
                <small>Control panel</small>
            </h1>
            @include('admin.common.breadcrumb')
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Templates Management</h3>
                            {{-- @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'add_properties')) --}}
                            <div class="pull-right"><a class="btn btn-success f-14"
                                    href="{{ route('templates.create') }}">Add Templates</a></div>
                            {{-- @endif --}}
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive parent-table f-14">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Alert Type</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Content</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($templates as $template)
                                            <tr>
                                                <td>{{ $template->alertType->name ?? '' }}</td>
                                                <td>{{ $template->subject ?? '' }}</td>
                                                <td>{{ $template->content }}</td>
                                                <td>
                                                    actions
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $templates->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('validate_script')
    <script src="{{ asset('backend/js/reset-btn.min.js') }}"></script>
    <script src="{{ asset('backend/js/admin-date-range-picker.min.js') }}"></script>
@endsection

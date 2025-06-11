@extends('admin.template')

@section('main')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Service Request Details <small>Control panel</small></h1>
            @include('admin.common.breadcrumb')
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Service Information</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Full Name</th>
                                    <td>{{ $service->full_name }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $service->phone }}</td>
                                </tr>
                                <tr>
                                    <th>No. of Guests</th>
                                    <td>{{ $service->no_of_guests }}</td>
                                </tr>
                                <tr>
                                    <th>Preferred Date</th>
                                    <td>{{ $service->preferred_date ? \Carbon\Carbon::parse($service->preferred_date)->format('d M Y') : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Preferred Time</th>
                                    <td>
                                        {{ $service->preferred_time ? \Carbon\Carbon::parse($service->preferred_time)->format('h:i A') : '-' }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Notes</th>
                                    <td>{{ $service->notes ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Submitted At</th>
                                    <td>{{ $service->created_at->format('d M Y, h:i A') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="box-footer text-right">
                            <a href="{{ route('services.index') }}" class="btn btn-default">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

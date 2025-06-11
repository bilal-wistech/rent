@extends('admin.template')

@section('main')
<div class="content-wrapper">
    <section class="content">
        <div class="box box_info">
            <div class="box-header">
                <h3 class="box-title">View Enquiry Message</h3>
                <div class="pull-right">
                    <a href="{{ route('enquiries.index') }}" class="btn btn-default btn-sm">Back</a>
                </div>
            </div>

            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{ $message->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $message->email }}</td>
                    </tr>
                    <tr>
                        <th>Subject</th>
                        <td>{{ $message->subject }}</td>
                    </tr>
                    <tr>
                        <th>Message</th>
                        <td>{{ $message->message }}</td>
                    </tr>
                    <tr>
                        <th>Submitted At</th>
                        <td>{{ $message->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection

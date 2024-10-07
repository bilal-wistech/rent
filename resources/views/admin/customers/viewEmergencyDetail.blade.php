@extends('admin.template')

@section('main')
<div class="content-wrapper">
    <section class="content">
        @include('admin.customerdetails.customer_menu')

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="d-flex justify-content-between align-items-center mt-3 px-3 pt-3">
                        <h5 class="box-title">Emergency Contacts</h5>
                        <div><a class="btn btn-success" href="{{ route('emergencycontacts.edit', $user->id) }}">Add More</a></div>
                    </div>
               <div class="table-responsive mt-3 px-3 py-3">
    <table class="table table-striped table-hover dt-responsive dataTable" id="dataTableBuilder">
        <thead class="table-light">
            <tr>
                <th class="text-center align-middle">ID</th>
                <th class="text-center align-middle">Name</th>
                <th class="text-center align-middle">Relation</th>
                <th class="text-center align-middle">Phone</th>
                <th class="text-center align-middle">Action</th>
            </tr>
        </thead>
        <tbody>

            @if($emergencycontacts)
                @php
                    $i = 0;
                @endphp
                @foreach($emergencycontacts as $emergencycontact)
                <tr>
                    <td class="text-center align-middle">{{ ++$i }}</td>
                    <td class="text-center align-middle">{{ $emergencycontact->name }}</td>
                    <td class="text-center align-middle">{{ $emergencycontact->relation }}</td>
                    <td class="text-center align-middle">{{ $emergencycontact->contact_number }}</td>
                    <td class="text-center align-middle">
                        <form action="{{ route('emergencycontacts.create') }}" method="GET" style="display:inline;">

                            <input type="hidden" name="id" value="{{ $emergencycontact->id}}"/>
                            <button type="submit" class="btn btn-xs btn-primary">
                                <i class="fa fa-edit"></i>
                            </button>
                        </form>
                         <form action="{{ route('emergencycontacts.destroy', $emergencycontact->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fa fa-trash"></i>
                            </button>&nbsp;
                        </form>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">No Documents Found</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('validate_script')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- For FontAwesome Icons -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection

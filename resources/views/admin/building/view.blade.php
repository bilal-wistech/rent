@extends('admin.template')

@section('main')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-12 settings_bar_gap">
                    @include('admin.common.settings_bar')
                </div>
                <div class="col-lg-9 col-12">
                    <div class="box box_info">
                        <div class="box-header d-flex justify-content-between align-items-center w-100">
                            <div>
                                <h3 class="box-title">Buildings in Area: {{ $area->name }}</h3>
                            </div>
                            <div class="d-flex align-items-center justify-content-end" style="width: 67.7%;">
                                <a href="{{ route('building.add', $area->id) }}" class="btn btn-success f-14">Add Building</a>
                            </div>
                        </div>


                        <div class="box-body">
                            <div class="parent-table filters-parent f-14">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert"
                                        style="position: relative;">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                                            style="position: absolute; right: 10px; top: 10px;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                        style="position: relative;">
                                        {{ session('error') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                                            style="position: absolute; right: 10px; top: 10px;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                {!! $dataTable->table(['class' => 'table table-striped dt-responsive', 'width' => '100%', 'cellspacing' => '0']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/plugins/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/Responsive-2.2.2/js/dataTables.responsive.min.js') }}"></script>
    {!! $dataTable->scripts() !!}

    <!-- Bootstrap JS dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endpush

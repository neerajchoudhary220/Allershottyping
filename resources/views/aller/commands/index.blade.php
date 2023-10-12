@extends('aller.layout.master')
@section('content')
<div class="page-header">
    <h3 class="page-title">Commands </h3>
  </div>

<div class="row">
    <div class="col-xl">
        <div class="card">
            <div class="card-body table-responsive text-nowrap mt-3">
                <table class="table table-striped table-hover w-100" id="dt-table">
                    <thead>
                        <tr class="text-nowrap">
                            <td>#</td>
                            <td>Name</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


@push('internal-js')
<script>
    const uRL = `{{route('aller.technique.list')}}`;

    </script>
<script src="{{asset('assets/js/databl/commands-dt.js')}}"></script>
@endpush

@endsection

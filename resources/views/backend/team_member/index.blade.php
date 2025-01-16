@extends('backend.layouts.master')

@section('title')
Damian Corporate | Manaage Team Member
@endsection

@push('styles')
<style>
    .flex-wrap {
        display: none !important;
    }
</style>
@endpush

@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Manage Team Member</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Manage Team Member
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-6 col-sm-12 text-right">
                    <div class="dropdown">
                        <a class="btn btn-primary" href="{{ route('team-member.create') }}">
                            <i class="fa fa-plus" aria-hidden="true"> </i> Team Member
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <!-- Export Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">All Team Member List</h4>
            </div>
            <div class="pb-20">
                <table class="table hover data-table-export1 nowrap p-3">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Member Profile Image</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Team Name</th>
                            <th>Status</th>
                            <th class="no-export">Edit</th>
                            <th class="no-export">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($team_members as $key => $value)
                        <tr>
                            <td>{{ ++$key }}</td>

                            <td class="text-wrap text-justify">
                                @if($value->member_profile_image)
                                    <img src="{{ asset('/damian_corporate/team_member/member_profile_image/' . $value->member_profile_image) }}" alt="{{ $value->image }}" style="width: 80px; height: 80px !important;">
                                @endif
                            </td>

                            <td class="text-wrap text-justify">{{ $value->name }}</td>

                            <td class="text-wrap text-justify">{{ $value->designation }}</td>

                            <td class="text-wrap text-justify">{{ $value->team?->team_name }}</td>

                            @if ($value->status == 1)
                                <td class="text-wrap text-justify"><span class="badge badge-success">Active</span></td>
                            @elseif ($value->status == 2)
                                <td class="text-wrap text-justify"><span class="badge badge-danger">Inactive</span></td>
                            @endif

                            <td class="no-export">
                                <a href="{{ route('team-member.edit', $value->id) }}">
                                    <button class="btn btn-warning btn-sm">
                                        <i class="micon dw dw-pencil-1"></i> Edit
                                    </button>
                                </a>
                            </td>
                            <td class="no-export">
                                <form action="{{ route('team-member.destroy', $value->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">
                                        <i class="micon dw dw-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Export Datatable End -->
    </div>

    <!-- Footer Start -->
    <x-backend.footer />
    <!-- Footer Start -->
</div>
@endsection

@push('scripts')
<script>
    $('.data-table-export1').DataTable({
        scrollCollapse: true,
        autoWidth: true,
        responsive: true,
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: false,
        }],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "language": {
            "info": "_START_-_END_ of _TOTAL_ entries",
            searchPlaceholder: "Search",
            // paginate: {
            //     next: '<i class="ion-chevron-right"></i>',
            //     previous: '<i class="ion-chevron-left"></i>'
            // }
        },
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                text: 'Copy',
                className: 'btn btn-default',
                exportOptions: {
                    columns: ':not(.no-export)'
                }
            },
            {
                extend: 'csv',
                text: 'Excel',
                className: 'btn btn-default',
                exportOptions: {
                    columns: ':not(.no-export)'
                }
            },
            {
                extend: 'pdf',
                text: 'PDF',
                className: 'btn btn-default',
                exportOptions: {
                    columns: ':not(.no-export)',
                },
               header: true,
               title: 'All Team Member List',
               orientation: 'landscape',
               pageSize: 'A4',
               customize: function(doc) {
                  doc.defaultStyle.fontSize = 16; //<-- set fontsize to 16 instead of 10
                  doc.defaultStyle.fontFamily = "sans-serif";
                // doc.defaultStyle.font = 'Arial';

               }
            },
            {
                extend: 'print',
                text: 'Print',
                className: 'btn btn-default',
                exportOptions: {
                    columns: ':not(.no-export)'
                }
            },
        ]
    });
</script>
@endpush

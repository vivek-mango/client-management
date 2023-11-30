<x-app-layout>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Client List') }}
    </h2>
</x-slot>

@section('content')

    <a href="/create-client"><button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mt-3 ml-3">{{ __('Create Client') }}</button></a>

    @if (session('success'))
        <div class="alert alert-success m-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-3 p-3">
        <table class="table table-bordered table-striped mt-3" id="clientTable">
            <thead>
                <th>{{ __('Company Name') }}</th>
                <th>{{ __('Company Email') }}</th>
                <th>{{ __('Contact Name') }} </th>
                <th>{{ __('Contact Email') }} </th>
                <th>{{ __('Created At') }} </th>
                <th>{{ __('Action') }} </th>
            </thead>
            <tbody></tbody>
        </table>
    </div>
@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $(function() {
            var table = $('#clientTable').DataTable({

                processing: true,
                serverSide: true,
                autowidth: false,
                ajax: {
                    url: "/list-client",
                },
                columns: [
                    {
                        data: 'company_name',
                        name: 'company_name'
                    },
                    {
                        data: 'company_email',
                        name: 'company_email'
                    },
                    {
                        data: 'contact_name',
                        name: 'contact_name'
                    },
                    {
                        data: 'contact_email',
                        name: 'contact_email'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                    },
                ],
                columnDefs: [
                    {
                        "width": "15%",
                        "targets": 0
                    },
                    {
                        "targets": 5,
                        "orderable": false
                    },
                ]
            });
            table.order([4, 'desc']).draw();
        });
    });
</script>
@endpush

</x-app-layout>

@section('page-title')
Environmental
@endsection
<div class="container">
    <h1>Environmental Data</h1>

    <div class="mb-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Value</th>
                    <th>Alert</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($environmentalData as $data)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($data->created_at)->format('Y-m-d H:i:s') }}</td>
                        <td>{{ $data->data_type }}</td>
                        <td>{{ $data->value }}</td>
                        <td>{{ $data->alert ? 'Yes' : 'No' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

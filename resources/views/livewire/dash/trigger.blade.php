@section('page-title')
Triggers
@endsection
<div class="container">
    <h1>Allergy Triggers</h1>

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
                @foreach ($triggers as $trigger)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($trigger->created_at)->format('Y-m-d H:i:s') }}</td>
                        <td>{{ $trigger->data_type }}</td>
                        <td>{{ $trigger->value }}</td>
                        <td>{{ $trigger->alert ? 'Yes' : 'No' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

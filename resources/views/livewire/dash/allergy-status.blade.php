@section('page-title')
Allergy status
@endsection
<div class="container">
    <h1>Allergy Status</h1>

    <div class="mb-5">
        <h2>Recent Symptoms</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Symptom</th>
                    <th>Severity</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($symptoms as $symptom)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($symptom->date)->format('Y-m-d') }}</td>
                        <td>{{ $symptom->symptom }}</td>
                        <td>{{ $symptom->severity }}</td>
                        <td>{{ $symptom->notes }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mb-5">
        <h2>Environmental Alerts</h2>
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
                @foreach ($environmentalAlerts as $alert)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($alert->created_at)->format('Y-m-d H:i:s') }}</td>
                        <td>{{ $alert->data_type }}</td>
                        <td>{{ $alert->value }}</td>
                        <td>{{ $alert->alert ? 'Yes' : 'No' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

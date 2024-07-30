@section('page-title')
Allergy status
@endsection
<div class="container">
    <h1>Recent Symptoms</h1>

    <div class="mb-5">
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
</div>

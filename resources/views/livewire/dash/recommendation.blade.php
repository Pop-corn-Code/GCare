@section('page-title')
Recommendation
@endsection
<div class="container">
    <h1>Personalized Recommendations</h1>

    <div class="mb-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Recommendation</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recommendations as $recommendation)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($recommendation->created_at)->format('Y-m-d H:i:s') }}</td>
                        <td>{{ $recommendation->recommendation }}</td>
                        <td>{{ $recommendation->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('shop_owner.header')
<div class="container mt-4">
    <h3>Job Verification</h3>

    <div class="table-responsive">
        <form id="bulk-action-form" method="POST" action="">
            @csrf
            <input type="hidden" name="job_ids" id="bulk-job-ids">
            <input type="hidden" name="action_type" id="bulk-action-type">

            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th><input type="checkbox" id="select-all"></th>
                        <th>Sr No.</th>
                        <th>Title</th>
                        <th>Shop Owner Name</th>
                        <th>Phone Number</th>
                        <th>Publish</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($job_data as $index => $job)
                        <tr>
                            <td><input type="checkbox" class="job-checkbox" value="{{ $job->id }}"></td>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $job->title }}</td>
                            <td>{{ $job->name ?? 'N/A' }}</td>
                            <td>{{ $job->phone_number ?? 'N/A' }}</td>
                            <td>{{ $job->is_publish ? 'Yes' : 'No' }}</td>
                            <td>{{ $job->is_verified ? 'Verified' : 'Unverified' }}</td>
                            <td>
                                <form method="POST" action="{{ route('admin.jobs.verify.reject.single', $job->id) }}" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="action_type" value="verify">
                                    <button type="submit" class="btn btn-success btn-sm">Verify</button>
                                </form>

                                <form method="POST" action="{{ route('admin.jobs.verify.reject.single', $job->id) }}" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="action_type" value="reject">
                                    <button type="submit" class="btn btn-danger btn-sm">Unverify</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if(count($job_data) === 0)
                        <tr>
                            <td colspan="6" class="text-center">No unverified jobs found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary" id="bulk-verify-btn" disabled onclick="submitBulkAction('verify')">Verify Selected</button>
                <button type="submit" class="btn btn-danger" id="bulk-reject-btn" disabled onclick="submitBulkAction('reject')">Unverify Selected</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectAll = document.getElementById('select-all');
        const checkboxes = document.querySelectorAll('.job-checkbox');
        const bulkVerifyBtn = document.getElementById('bulk-verify-btn');
        const bulkRejectBtn = document.getElementById('bulk-reject-btn');
        const bulkJobIds = document.getElementById('bulk-job-ids');
        const bulkActionType = document.getElementById('bulk-action-type');
        const form = document.getElementById('bulk-action-form');

        selectAll.addEventListener('change', function () {
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll.checked;
            });
            toggleBulkButtons();
        });

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                toggleBulkButtons();
            });
        });

        function toggleBulkButtons() {
            const anyChecked = Array.from(checkboxes).some(cb => cb.checked);
            bulkVerifyBtn.disabled = !anyChecked;
            bulkRejectBtn.disabled = !anyChecked;
        }

        window.submitBulkAction = function (type) {
            const selected = Array.from(checkboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.value);

            if (selected.length === 0) return;

            bulkJobIds.value = selected.join(',');
            bulkActionType.value = type;

            form.action = `{{ route('admin.jobs.verify.bulk') }}`;
        };
    });
</script>

@include('shop_owner.footer')
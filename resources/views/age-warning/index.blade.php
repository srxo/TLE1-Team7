@extends('layouts.app')

@section('content')
    <div>
        @if($showWarning)
            <div class="alert alert-danger" role="alert">
                <strong>Warning:</strong> This content is intended for users aged 18 and older.
            </div>
        @endif

        <p>Your page content goes here.</p>
    </div>
@endsection

<div class="form-check">
    <input type="checkbox" class="form-check-input" id="toggleWarning" onchange="toggleWarning()">
    <label class="form-check-label" for="toggleWarning">Toggle Age Warning</label>
</div>

<!-- Modal -->
<div class="modal fade" id="ageWarningModal" tabindex="-1" aria-labelledby="ageWarningModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ageWarningModalLabel">Age Warning</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>You must be 18 years or older to access this content.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



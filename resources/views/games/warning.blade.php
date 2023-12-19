@extends('layouts.app')

@section('content')
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ageWarningModalLabel">Age Warning</h5>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>You must be 18 years or older to access this content.</p>
            </div>
            <div class="modal-footer">
                <div>{{$bypassed}}</div>
                <a class="btn btn-secondary" href="{{route('games.show', ['game' => $game, '$bypassed' => true])}}">yes</a>
                <a class="btn btn-secondary" href="{{route('games.create')}}">no</a>
            </div>
        </div>
    </div>
@endsection

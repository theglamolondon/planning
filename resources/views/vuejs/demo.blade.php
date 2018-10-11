@extends('layout.main')

@section('content')
<div class="row">
    <div class="card col-md-12">
        <div class="card-body">
            <div id="app" style="min-height: 550px;">@{{ welcome }}</div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset("js/myVueJsApp.js") }}"></script>
@endsection
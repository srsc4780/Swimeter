@extends('admin.container')
@title('Add New Meter')

@section('contents')
    <form class="ui small ajax form" action="{{ route('admin.users.meters.add', $user) }}" method="post" data-redirect="on">
        <div class="field">
            <label for="ctrl_usage">Initial Usage</label>
            <input id="ctrl_usage" type="number" name="usage">
        </div>

        <div class="field">
            <label for="ctrl_cost">Initial Cost</label>
            <input id="ctrl_cost" type="number" step="0.01" name="cost">
        </div>

        <button class="ui icon labeled green button">
            <i class="paper plane icon"></i>
            Create
        </button>
    </form>
@endsection

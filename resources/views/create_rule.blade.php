@extends('template')

@section('title')
    Create Rule
@endsection

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form class="form" method="POST" action="{{ route('create_rule_submit') }}">
                        <div class="form-group">
                            <label class="control-label">Rule Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Select the field</label>
                            <select class="form-control select" name="field">
                                <option value="upload_speed">Upload Speed</option>
                                <option value="download_speed">Download Speed</option>
                                <option value="technology">Technology</option>
                                <option value="static_ip">Static IP</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Select the field</label>
                            <select class="form-control select" name="operand">
                                <option value="=">Equal To</option>
                                <option value=">=">Greater Than Or Equal To</option>
                                <option value=">">Greater Than</option>
                                <option value="<">Less Than</option>
                                <option value="<=">Less Than Or Equal</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Field Value</label>
                            <input type="text" name="value" class="form-control">
                        </div>

                        {{ csrf_field() }}

                        <button class="btn btn-info col-lg-12">Create Rule</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
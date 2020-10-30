@extends('template')

@section('title')
    Home
@endsection

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <form class="form" method="POST" action="{{ route('get_rule') }}">
                        <div class="form-group">
                            <label class="control-label">Select a Class Rule</label>
                            <select class="form-control select" name="rule" id="rule1">
                                <option value="UploadSpeedLessThan10">UploadSpeedLessThan10</option>
                                <option value="UploadSpeedLessThan10AndFiber">UploadSpeedLessThan10AndFiber</option>
                                <option value="DownloadSpeedGreaterThan100AndFiber">DownloadSpeedGreaterThan100AndFiber</option>
                            </select>
                        </div>

                        {{ csrf_field() }}

                        <button class="btn btn-info col-lg-12">Find</button>
                    </form>
                </div>

                <div class="col-lg-6">
                    <form class="form" method="POST" action="{{ route('get_custom_rule') }}">
                        <div class="form-group">
                            <label class="control-label">Select a Custom Rule</label>
                            <select class="form-control select" name="rule" id="rule2">
                                @foreach($custom_rules as $key => $custom_rule)
                                    <option value="{{ $custom_rule->name }}">{{ $custom_rule->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{ csrf_field() }}

                        <button class="btn btn-info col-lg-12">Find</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row"> 
                <div class="col-lg-12"> 
                    <br><br>
                    @if(count($products) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Upload Speed</th>
                                    <th>Download Speed</th>
                                    <th>Technology</th>
                                    <th>Static IP</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $key => $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->upload_speed }}</td>
                                    <td>{{ $product->download_speed }}</td>
                                    <td>{{ $product->technology }}</td>
                                    <td>{{ $product->static_ip }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
          $('#rule1').val('{{ $rule }}');
          $('#rule2').val('{{ $rule }}');
    });
</script>
@endsection
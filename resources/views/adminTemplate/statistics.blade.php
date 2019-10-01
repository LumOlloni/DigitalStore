@extends('layouts.admin')

@section('content-admin')
    
<div class="container">
  <div class="row">
      <div class="col-md-12">
          <div class="panel panel-default">
             <br>

              <div class="panel-body">
                  {!! $chart->html() !!}
              </div>
          </div>
      </div>
  </div>
</div>
{!! Charts::scripts() !!}
{!! $chart->script() !!}
@endsection
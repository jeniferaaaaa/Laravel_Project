@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">質問一覧画面</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <form method="POST" action="{{url('/home/made')}}">@csrf
                <div class="card-body">
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('質問一覧') }}</label>
                        </div>

                        <div class="form-group row">
                        @foreach($page as $key =>$val)
                        <div class="table-responsive">
                            <table class="table table-striped">
                            <tr>
                                <td width="30%">件名：{{ $val->title }}</td>
                                <td width="70%">内容：{{ $val->question }}</td>
                            </tr>
                            </table>
                        </div>
                        @endforeach
                        </div>

                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                {{ __('質問する') }}
                                </button>
                            </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

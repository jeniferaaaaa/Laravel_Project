@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">回答画面</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('質問一覧') }}</label>
                    </div>

                        @foreach($page as $key =>$val)
                        <div class="card-body">
                        <form method="POST" action="{{url('/home/answer')}}">@csrf
                            <div class="table-responsive">
                                <table class="table table-striped">
                                <tr>
                                    <td width="30%">件名：{{ $val->title }}</td>
                                    <td width="63%">内容：{{ $val->question }}</td>
                                    <input type="hidden" name="id" value="{{ $val->id }}">
                                    @if ($val->flag == 0)
                                    <td width="7%"><button type="submit" class="btn btn-primary">{{ __('回答する') }}</button></td>
                                    @else
                                    <td width="7%"><button type="submit" class="btn btn-primary" disabled>{{ __('回答済み') }}</button></td>
                                    @endif
                                </tr>
                                </table>
                            </div>
                        </form>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
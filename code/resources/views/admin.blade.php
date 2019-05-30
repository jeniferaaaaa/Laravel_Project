@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">管理権限申請フォーム</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <form method="POST" action="{{ url('/admin/complete') }}">@csrf
                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('付与したいユーザID') }}</label>

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ Auth::user()->user_id }}" required autocomplete="id" autofocus>

                                @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mail" class="col-md-4 col-form-label text-md-right">{{ __('登録メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="mail" rows="4" cols="40"　type="mail" class="form-control @error('mail') is-invalid @enderror" name="mail" value="{{ Auth::user()->email }}" required autocomplete="mail" autofocus>

                                @error('mail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label class="col-md-4 col-form-label text-md-right" style="margin:auto">{{ __('上記内容で登録します') }}</label>

                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                {{ __('申請する') }}
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
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

                <form method="POST" action="{{url('/home/answer/complete')}}">@csrf
                <div class="card-body">
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('質問内容') }}</label>
                        </div>

                        @foreach ($que as $key => $val)
                        <div class="form-group row">
                            <label for="tilt" class="col-md-4 col-form-label text-md-right">{{ __('件名') }}</label>

                            <div class="col-md-6">
                                <label id="tilt" type="text" class="form-control" name="tilt" >{{$val->title}}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="question" class="col-md-4 col-form-label text-md-right">{{ __('質問内容') }}</label>

                            <div class="col-md-6">
                                <label id="question" type="text" class="form-control" name="question" >{{$val->question}}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="que_user" class="col-md-4 col-form-label text-md-right">{{ __('質問者') }}</label>

                            <div class="col-md-6">
                                <label id="que_user" type="text" class="form-control" name="que_user" >{{$val->que_user}}</label>
                            </div>
                        </div>
                        @endforeach
                        

                        <div class="form-group row">
                            <label for="answer" class="col-md-4 col-form-label text-md-right">{{ __('回答内容') }}</label>

                            <div class="col-md-6">
                                <textarea id="answer" rows="4" cols="40"　type="textarea" class="form-control @error('question') is-invalid @enderror" name="answer" value="{{ old('answer') }}" required autocomplete="answer" autofocus></textarea>

                                @error('answer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            <div class="col-md-8 offset-md-4">
                            　　<a type="button" class="btn btn-primary" href="javascript:history.back();">戻る</a>

                                <button type="submit" class="btn btn-primary">
                                {{ __('回答を送信') }}
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
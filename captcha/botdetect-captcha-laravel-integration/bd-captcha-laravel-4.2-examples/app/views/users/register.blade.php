@extends('layouts.master')

@section('content')

    <h2>Register now</h2><hr>

    @if (Session::has('status'))
      <div class="alert alert-success">
        {{ Session::get('status') }}
      </div>
    @endif

    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{ Form::open(array('url' => 'users/register')) }}

    <div class="form-group">
        {{ Form::label('inputName', 'Name') }}
        {{ Form::text('name', Input::old('name'), array(
                'id' => 'inputName',
                'class' => 'form-control'
            ))
        }}
    </div>

    <div class="form-group">
        {{ Form::label('inputEmail', 'Email') }}
        {{ Form::text('email', Input::old('email'), array(
                'id' => 'inputEmail',
                'class' => 'form-control'
            ))
        }}
    </div>

    <div class="form-group">
        {{ Form::label('inputPassword', 'Password') }}

        {{ Form::password('password', array(
                'id' => 'inputPassword',
                'class' => 'form-control'
            ))  
        }}
    </div>

    <div class="form-group">
        {{ Form::label('inputPasswordConfirmation', 'Confirm Password') }}

        {{ Form::password('password_confirmation', array(
                'id' => 'inputPasswordConfirmation',
                'class' => 'form-control'
            ))  
        }}
    </div>

    <div class="form-group">
        <!-- Captcha image html-->
        {{ $captchaHtml }}
    </div>

    <div class="row">
        <div class="form-group col-sm-4">
            {{ Form::label('CaptchaCode', 'Retype the characters from the picture') }}

            <!-- Captcha code user input textbox -->
            {{ Form::text('CaptchaCode', null, array(
                    'id' => 'CaptchaCode',
                    'class' => 'form-control'
                ))
            }}
        </div>
    </div>

    {{ Form::submit('Register', array('class' => 'btn btn-primary')) }}     
{{ Form::close() }}

@stop

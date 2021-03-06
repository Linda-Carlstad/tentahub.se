@section('title', 'Byt uppgifter')
@extends('layouts.app')

@section('content')

    <h1>Inställningar för {{ $user->name }} ({{ $user->association->name }})</h1>
    <form class="" action="{{ '/user/' . $user->id }}" method="post">
        @csrf
        @method( 'PUT' )
        <input type="hidden" name="type" value="info">

        <div class="form-group row">
            <label for="name">Namn</label>
            <input id="name" type="text" placeholder="Namn" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="email">Email</label>
            <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email' ) }}</strong>
                </span>
            @endif
        </div>



        <div class="form-group row mb-0">
            <div class="col-lg-8 offset-lg-2">
                <button type="submit" class="btn btn-primary ml-0">
                    Save
                </button>
            </div>
        </div>
    </form>
    <hr>
    <form action="{{ '/admins/' . $user->id }}" method="post">
        @csrf
        {{ method_field( 'delete' ) }}
        <div class="text-center">
            <h4>Ta bort användare</h4>
            <p>Denna åtgärd är permanent.</p>
            <button type="submit" class="btn btn-danger">
                Ta bort
            </button>
        </div>
    </form>

@endsection

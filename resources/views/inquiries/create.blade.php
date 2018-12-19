@extends('layouts.app')

@section('content')
    <form method="post" action="{{route('inquiries.store')}}">
        
        @csrf
        
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name :</label>
            <div class="col-sm-10">
                <input id="name" type="text" name="name" class="form-control {{ $errors->has('name') ? "is-invalid" : "" }}" value="{{ old('name') }}" placeholder="Name">
                @if($errors->has('name'))
                    <strong class="invalid-feedback">{{ $errors->first('name') }}</strong>
                @endif
            </div>
        </div>
        
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email :</label>
            <div class="col-sm-10">
                <input id="email" type="text" name="email" class="form-control {{ $errors->has('email') ? "is-invalid" : "" }}"
                       value="{{ old('email') }}" placeholder="Email">
                @if($errors->has('email'))
                    <strong class="invalid-feedback">{{ $errors->first('email') }}</strong>
                @endif
            </div>
        </div>
        
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone :</label>
            <div class="col-sm-10">
                <input id="phone" type="text" name="phone" class="form-control {{ $errors->has('phone') ? "is-invalid" : "" }}" value="{{ old('phone') }}" placeholder="Phone">
                @if($errors->has('phone'))
                    <strong class="invalid-feedback">{{ $errors->first('phone') }}</strong>
                @endif
            </div>
        </div>
        
        
        <div class="form-group row">
            <label for="message" class="col-sm-2 col-form-label">Message :</label>
            <div class="col-sm-10">
            <textarea id="message" name="message" class="form-control {{ $errors->has('message') ? "is-invalid" : "" }}"
                      placeholder="Message">{{ old('message') }}</textarea>
                @if($errors->has('message'))
                    <strong class="invalid-feedback">{{ $errors->first('message') }}</strong>
                @endif
            </div>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn">Submit</button>
        </div>
    
    </form>
@endsection
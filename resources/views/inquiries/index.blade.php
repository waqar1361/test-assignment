@extends('layouts.app')

@section('content')
    
    <form>
        <div class="form-group row">
            <label for="search" class="col-sm-2 col-form-label">Search :</label>
            <div class="col">
            <input id="search" type="text" name="search" class="form-control {{ $errors->has('search') ? "is-invalid" : "" }}"
                   value="{{ old('search') }}" placeholder="Search with name, phone or email">
            @if($errors->has('search'))
                <strong class="invalid-feedback">{{ $errors->first('search') }}</strong>
            @endif
            </div>
       
        </div>
    </form>

    <section id="search-data">
        @include('inquiries.table')
    </section>

    <div id="pagination">{{{ $inquiries->links() }}}</div>
    
@endsection
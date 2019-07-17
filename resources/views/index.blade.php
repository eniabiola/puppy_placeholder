@extends('layouts.app')

@section('content')
<div class="container">

        <div class="mw10 center ph3-ns">
          <div class="cf">
            <div class="fl w-100 w-100-ns pa2">
                    <div class="mw9 center">
                          <div class="cf">
                            {{-- {{ $imageNames[0] }} --}}
                      @foreach($ids as $id)
                            <div class="fl w-50 w-50-ns pa2">
                              <div class="pa2">
                                <img src="{{ route('indexShow', $id) }}">
                              </div>
                              <input type="read-only" value="{{ url('/500/350') }}" class="f6 link dim br3 ba ph3 pv2 mb2 dib purple w-100 ">
                            </div>
                      @endforeach
                          </div>
                    </div>
            </div>
          </div>
        </div>
</div>
@endsection

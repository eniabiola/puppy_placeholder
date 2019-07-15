@extends('layouts.app')
<style type="text/css">
	.reframe {
  height: 100px;
  width: 150px;
  overflow: hidden;
}
.reframe img {
  height: auto;
  width: 150px;
}
</style>
@section('content')
<div class="container">
        <div class="col-md-7">
        </div>
        <div class="col-md-3"></div>

        <div class="mw9 center ph3-ns">
		  <div class="cf ph2-ns">
		    <div class="fl w-70 w-70-ns pa2">
		        <div class="outline bg-white">
		            <div class="card">
		                <div class="card-header">Dashboard</div>

		                <div class="card-body">
							<div class="mw9 center">
								  <div class="cf reframe">
			                  		<img src=" {{ url('images/puppies/'.$article->imageName)}} ">
								  </div>
							</div>
		                </div>
		            </div>
	        	</div>
		    </div>
		  </div>
		</div>
</div>
@endsection

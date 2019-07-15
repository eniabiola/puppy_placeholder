@extends('layouts.app')

@section('content')
<div class="container">
        <div class="col-md-7">
        </div>
        <div class="col-md-3"></div>

        <div class="mw9 center ph3-ns">
		  <div class="cf ph2-ns">
		    <div class="fl w-70 w-70-ns pa2">
		        <div class="outline bg-white">
		        	@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
		            <div class="card">
		                <div class="card-header">Dashboard</div>

		                <div class="card-body">
							<div class="mw9 center">
								  <div class="cf ">
			                  @foreach($articles as $article)
								    <div class="fl w-30 w-30-ns pa2">
								      <div class="outline bg-white pa2">
								      	{{$article->imageName}}
								      </div>
								    </div>
			                  @endforeach
								  </div>
							</div>
		                </div>
		            </div>
	        	</div>
		    </div>
		    <div class="fl w-30 w-30-ns pa2">
		      <div class="outline bg-white">
	            <div class="card">
	                <div class="card-header">Upload New Images</div>

	                <div class="card-body">
	                    <form action="{{ route('placeholder.store') }}" method="POST" enctype="multipart/form-data">
	                    	 @csrf
	                    	 <div>
		                    	 <label for="name">Puppy Name/Breed</label>
		                    	 <input type="text" name="name" id="name" placeholder="Alsatian" class="form-control" value="{{ old('name') }}">
	                    	 </div>   
	                    	 <div class="pb2">
		                    	 <label for="image">Puppy Image</label>
		                    	 <input type="file" name="image" id="image" class="form-control">
	                    	 </div>     
	                    	 <div>
	                    	 	<button class="btn btn-primary" type="submit">Bring Puppy Home</button>
	                    	 </div>                          	
	                    </form>
	                </div>
	            </div>		      	
		      </div>
		    </div>
		  </div>
		</div>
</div>
@endsection

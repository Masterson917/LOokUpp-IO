@extends('layouts.app')




@section('content')
<div class="h-20"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('widgets.sidebar')
            </div>
            <div class="col-md-9">
                <div class="content-page-title">
                    <form id="" method="get" action="{{ url('/search') }}">
                        <div class="input-group col-md-12">
                            <input type="text" class="form-control input-lg" name="s" placeholder="Search a skill to find a tutor..." />
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-lg" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                   
                </div>
                
                 <div class="content-page-title-m">
                  <p style="color:white;">FIND TUTORS WHO TEACH:</p>
                 </div>
                 
                 <a href="/search?s=game development">	
                 <div class="card">
                     <div class="front">
                      	<div class="cover" style="background-image: url('{{ asset('images/gd.jpg') }}') ">
                      	<div class="card-find"> Game development</div></div>
                      	</div>
                    </div>
                 </a>   	

                 <a href="/search?s=photography">	
                 <div class="card">
                     <div class="front">
                      	<div class="cover" style="background-image: url('{{ asset('images/foto.jpg') }}')">	
                      	<div class="card-find"> Photography</div></div>
                    </div>
                    </div>	
                    </a>

                 <a href="/search?s=coding">	   
                 <div class="card">
                     <div class="front">
                      	<div class="cover" style="background-image: url('{{ asset('images/code.jpg') }}')">
                      	<div class="card-find"> Coding</div></div>
                    </div>
                    </div>	
                    </a>

                 <a href="/search?s=music">	   
                 <div class="card">
                     <div class="front">
                      	<div class="cover" style="background-image: url('{{ asset('images/guitar.jpg') }}')"><div class="card-find"> Music</div></div>
                    </div>
              </div>      	
              </div> 
              </a>



           </div>
           </div>   
@endsection            
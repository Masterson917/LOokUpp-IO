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

                



                @if($groups->count() == 0)

                    <div class="alert-message alert-message-default">
                        <h4>You are not in any groups. LOokUpp needs your <b>location</b> and <b>interests</b> to add you to a group, first go to your browser settings and allow location then click <a href="{{ url('/location') }}">Here</a> to find your location. Edit your interests in your <a href="{{ url('/'.Auth::user()->username) }}">profile.</a></h4>
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


                @else

                    @if(isset($city->name))  
                    <div class="content-page-title-m">
                  <p style="color:white;">Enter a study-group:</p>
                 </div>

                    <div class="row">
                  
                    @foreach($groups->get() as $group)

                            <div class="col-sm-6 col-md-4">
                                <a class="bs-box" href="{{ url('/group/'.$group->id) }}">
                                    <h3>{{ $group->hobby->name }}</h3>
                                    <p>People in {{ $city->name }}: {{ $group->countPeople($city->id) }}</p>
                                </a>
                            </div>

                    @endforeach
                    @else

                     <div class="alert-message alert-message-default">
                        <h4>You are not in any groups. LOokUpp needs your <b>location</b> and <b>interests</b> to add you to a group, first go to your browser settings and allow location then click <a href="{{ url('/location') }}">Here</a> to find your location. Edit your interests in your <a href="{{ url('/'.Auth::user()->username) }}">profile.</a></h4>
                    </div>


                    </div>
                    @endif
                @endif


            </div>
        </div>
    </div>



@endsection

@section('footer')

@endsection
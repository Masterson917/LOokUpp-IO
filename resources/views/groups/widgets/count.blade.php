<div class="count_widget">
    <div class="row">
        <div class="col-xs-6">
            <a class="green" href="{{ url('/group/'.$group->id.'/stats') }}">
                {{ $group->countPeople($city->id) }}
            </a>
             <p style="color:white;">{{ $city->name }}</p>
        </div>
        <div class="col-xs-6">
            <a class="blue" href="{{ url('/group/'.$group->id.'/stats') }}">
                {{ $group->countPeople() }}
            </a>
            <p style="color:white;">Total</p>
        </div>
    </div>
</div>


@foreach ($users as $user)
    {{ $user->name }} - {{ $user->email }} - {{ $user->age }} - {{ $user->city }} . 
    <a  href="{{ url('resources/' . $user->id)}}" >go to see  user details</a> "<br/>"
    
@endforeach
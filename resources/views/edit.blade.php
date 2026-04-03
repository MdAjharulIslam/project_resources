<h1>Edit User Name</h1>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<form action="{{ route('resources.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ $user->name }}" required>
    
    <button type="submit">Update</button>
</form>
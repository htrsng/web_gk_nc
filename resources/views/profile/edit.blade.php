@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Profile</h1>
    @if (session('status') === 'profile-updated')
        <p>Profile updated successfully!</p>
    @endif
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')
        <div>
            <label for="name">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name', auth()->user()->name) }}" required>
            @error('name') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', auth()->user()->email) }}" required>
            @error('email') <span>{{ $message }}</span> @enderror
        </div>
        <button type="submit">Save</button>
    </form>
    <form method="POST" action="{{ route('profile.destroy') }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Account</button>
    </form>
</div>
@endsection
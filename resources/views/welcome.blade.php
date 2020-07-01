@extends('layouts.app')
@section('content')
            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
                <hr>
                <form action = "{{ route('reminder') }}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Email address">
                        <input type="text" name="event" placeholder="Event Title">
                        <button type="submit">Send Me A Mail</button>
                </form>

            </div>
            
@endsection

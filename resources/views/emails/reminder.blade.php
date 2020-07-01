{{-- resources/views/emails/reminder.blade.php --}}
<h1>Blah уже скоро!</h1>
<h1>{{ $event }} уже скоро!</h1>
<p>Blah blah blah, joke joke joke. Simply means you're in the right place</p>
<h2>For more info contact with {{ $contact }}</h2>
<img src="{{ asset('storage/thumbnail.jpg') }}">

<p>
<img src="data:image/jpeg;base64, {{ base64_encode(file_get_contents(public_path() . '/images/cat3.jpg')) }}" alt="Real Cat">
</p>

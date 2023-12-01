@foreach($sections as $h)
    <option value="{{ $h->id }}">{{ $h->name }}</option>
@endforeach
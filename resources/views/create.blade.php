@extends('app')

@section('content')
    <form x-data
          @submit.prevent="$dispatch('recaptcha')"
          action="/posts"
          method="post"
    >
        @csrf
        <x-recaptcha />
        <button type="submit">Create post</button>

        @error('recaptchaToken')
            <div>{{ $message }}</div>
        @enderror
    </form>

@endsection

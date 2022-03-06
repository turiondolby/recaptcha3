@extends('app')

@section('content')
    <form x-data="{
            execute() {
                grecaptcha.ready(() => {
                    grecaptcha.execute('6LdHOrseAAAAALOb-FN_ceJ2ZABRJcX03883XEid', {action: 'post'})
                    .then((token) => {
                        this.$refs.recaptchaToken.value = token;
                        this.$el.submit();
                    })
                })
            }
        }"
          @submit.prevent="execute()"
          action="/posts"
          method="post"
    >
        @csrf
        <input type="hidden" name="recaptchaToken" x-ref="recaptchaToken">
        <button type="submit">Create post</button>
    </form>

@endsection

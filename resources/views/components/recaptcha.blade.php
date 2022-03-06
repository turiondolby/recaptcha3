@props(['action' => 'submit'])

<div
    @recaptcha.window="execute()"
    x-data="{
        execute() {
            grecaptcha.ready(() => {
                grecaptcha.execute('{{ config('recaptcha.key') }}', { action: '{{ $action }}' })
                .then((token) => {
                    this.$refs.recaptchaToken.value = token;
                    this.$el.closest('form').submit();
                })
            })
        }
    }"
>
    <input type="hidden" name="recaptchaToken" x-ref="recaptchaToken">
</div>

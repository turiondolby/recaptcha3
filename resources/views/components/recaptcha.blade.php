@props(['action' => 'submit'])

<div
    @recaptcha.window="execute()"
    x-data="{
        execute() {
            grecaptcha.ready(() => {
                grecaptcha.execute('6LdHOrseAAAAALOb-FN_ceJ2ZABRJcX03883XEid', { action: '{{ $action }}' })
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

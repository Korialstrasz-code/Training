$(document).ready(function(){
    $(document).on('click', '#submit', (e) => {
        const form = $('form');

        $.ajax({
            type: 'post',
            url: form.data('url'),
            data: form.serialize(),
            error(data) {
                if (data.status === 422) {
                    let errors=data.responseJSON;
                } else if (data.status === 403) {
                    location.reload(true);
                }
            },
            success(result) {
                location.href=form.data('index');
            }
        }).then((result) => {
        });
    });
});

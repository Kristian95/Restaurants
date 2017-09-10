jQuery(function($) {
    $('a[href="#destroyModal"]').on('click', function() {
        var $this = $(this);
        $('#modal-text').text($this.attr('data-text'));
        $('#destroy-form').attr('action', $this.attr('data-url'));
    });
});

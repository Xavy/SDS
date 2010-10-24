$(document).ready(function() {
    $('input.datetime').live('click', function() {
		$(this).datepicker({
                    showOn:'focus',
                    duration: '',
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '2007:2020',
                    showTime: true,
                    time24h: true,
                    currentText: 'Dnes',
                    closeText: 'OK'
                }).focus();
	});

        /*
    $('input.datetime').datepicker( {
        duration: '',
        changeMonth: true,
        changeYear: true,
        yearRange: '2007:2020',
        showTime: true,
        time24h: true,
        currentText: 'Dnes',
        closeText: 'OK'
    });*/
});

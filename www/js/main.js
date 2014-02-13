/* Načte Nette AJAX */
$(function(){
	$.nette.init();
});

/* Odstraní _fid z URL */
$(function(){
	if(window.history.replaceState) {
		l = window.location.toString();
		uri = l.indexOf('_fid=');
		if(uri != -1) {
			uri = l.substr(0, uri)+l.substr(uri+10);
			if( (uri.substr(uri.length-1) == '?') || (uri.substr(uri.length-1) == '&') ) {
				uri = uri.substr(0, uri.length-1);
			}
			window.history.replaceState('', document.title, uri);
		}
	}
});

/* Confirm dialog */
$(function(){
    $('a[data-confirm]').click(function(ev) {
        var href = $(this).attr('href');

        if (!$('#dataConfirmModal').length) {
            $('body').append('\
				<div id="dataConfirmModal" class="bootbox modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">\n\
					<div class="modal-dialog">\n\
						<div class="modal-content">\n\
							<div class="modal-body">\n\
							</div>\n\
							<div class="modal-footer">\n\
								<button class="btn" data-dismiss="modal" aria-hidden="true">Ne</button>\n\
								<a class="btn btn-primary" id="dataConfirmOK">Ano</a>\n\
							</div>\n\
						</div>\n\
					</div>\n\
				</div>');
        } 
        $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
        $('#dataConfirmOK').attr('href', href);
        $('#dataConfirmModal').modal({show:true});
        return false;
    });
});
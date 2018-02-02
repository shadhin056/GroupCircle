$(document).ready(function() {
  $('.msg_box').hide();

  $('.msg_head').click(function(){
    $('.msg_wrap').slideToggle('slow');
  });

  $('.close').click(function(){
    $('.msg_box').hide();
  });

  $('.user').click(function(){
    $('.msg_box').show();
    $('.msg_wrap').show();
  });

  $('textarea').keypress(
    function(e){
        if (e.keyCode == 13) {
            e.preventDefault();
            var msg = $(this).val();
			      $(this).val('');
			     if(msg!='')
			        $('<div class="msg_snd">'+msg+'</div>').insertBefore('.msg_insert');
			     $('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
        }
    });

});

jQuery(document).ready(function () {
   $('#newsBtn').click(function () {
      $(this).text('Завантаження...');
      var data = {
         'action': 'loadmore',
         'query': posts_vars,
      }; 
      $.ajax({
         url: ajaxurl,
         data: data,
         type: 'POST',
         success: function (data) {
            if (data) {
               $('#newsBtn').text('Показати ще').before(data); 
               $("#newsBtn").remove(); 
            }
            else {
               $('#newsBtn').remove(); 
            }
         }
      });
   });
});
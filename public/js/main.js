$(function (){
	$('#markAsRead').click(function(){
		alert('clicked');
	});
});
// function markNotificationAsRead(notificationCount){
// 	alert('clicked');
// }

	$( function() {
        
        $("#searchItem").autocomplete({
          source: '{{url("search")}}'
        });
      });
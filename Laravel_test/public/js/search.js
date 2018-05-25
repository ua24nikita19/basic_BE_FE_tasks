$(document).ready(function () {
  // $('#getRequest').click(function () {
  // $.get('/employees/find',{param: document.getElementById('text').value}, function (data) {
  //   $('#getRequestData').append(data);
  //     console.log(data);
  // });
  // })
  $('#text').bind("input", function() {
    if(this.value.length >= 2){
      $.get('/employees/find',{param: document.getElementById('text').value}, function (data) {
        $(".search_result").html(data).fadeIn();
      });
    }
  })
})
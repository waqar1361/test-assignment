$(document).ready(function () {
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
});

// $('#search').onchange(function () {
//
//      $.ajax({
//              url: "",
//              type: "post",
//              data: {
//
//              } ,
//              success: function (response) {
//                 $('').html(response.data)
//                 },
//              error: function(jqXHR, textStatus, errorThrown) {
//                 console.log(textStatus, errorThrown);
//              }
//
//          });
//
// });
//
//
//     $('#pagination a').on('click', function(e){
//         e.preventDefault();
//         // var url = $('#search').attr('action')+'?page='+page;
//         // $.post(url, $('#search').serialize(), function(data){
//         //     $('#posts').html(data);
//         // });
//     });
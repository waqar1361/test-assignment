$(document).ready(function () {
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
});

function search(url = '/inquiries') {
    let query = $('#search').val();
    
    if (query.length > 2) {
        $.ajax({
            url: "/inquiries",
            type: "get",
            data: {
                'search': query
            },
            success: function (response) {
                $('#search-data').html(response.data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }
    
}

$('#search').keypress(function (e) {
    if (e.which == 13) {
        search();
    }
});

$(document.body).on('click', '#pagination a', function (e) {
    e.preventDefault();
    var url = $(this).attr('href');
    $.ajax({
        url: url,
        type: "get",
        data: {},
        dataType: 'json',
        async: false,
        timeout: 2000,
        success: function (response) {
            $('#search-data').html(response.data)
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
        
    });
});
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(".btn-tog").change(function (e) {
        e.preventDefault();
        var userid = $(this).data("id");
        $.ajax({
            type: "post",
            url: "user-permission",
            data: { signal: 1, userid: userid },
            success: function (response) {
                console.log(response);
                //$("#tableContainerId").load("{{url('getusers')}} #mytable");
                alert("Permission for selected user is enabled");
                location.reload();
            },
        });
    });
});
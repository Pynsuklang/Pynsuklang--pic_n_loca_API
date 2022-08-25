$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#sel_usrs_all_enab").change(function () {
        $(".sel_usrs_enab").prop("checked", $(this).prop("checked"));
        if ($(this).prop("checked") == true) {
            console.log("Checkbox is checked.");
            var inputs = $(".sel_usrs_enab");
            for (var i = 0; i < inputs.length; i++) {
                checkedArray[i] = $(inputs[i]).data("id");
            }
        } else if ($(this).prop("checked") == false) {
            console.log("Checkbox is unchecked.");
            checkedArray = [];
        }
        console.log(checkedArray);
    });

    $("#sel_usrs_all_dis").change(function () {
        $(".sel_usrs_dis").prop("checked", $(this).prop("checked"));
        if ($(this).prop("checked") == true) {
            console.log("Checkbox is checked.");
            var inputs = $(".sel_usrs_dis");
            for (var i = 0; i < inputs.length; i++) {
                checkedArray[i] = $(inputs[i]).data("id");
            }
        } else if ($(this).prop("checked") == false) {
            console.log("Checkbox is unchecked.");
            checkedArray = [];
        }
        console.log(checkedArray);
    });

    $(".btn-tog-disable").change(function (e) {
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
    $(".btn-tog-enable").change(function (e) {
        e.preventDefault();
        var userid = $(this).data("id");
        $.ajax({
            type: "post",
            url: "user-permission",
            data: { signal: -1, userid: userid },
            success: function (response) {
                console.log(response);
                //$("#tableContainerId").load("{{url('getusers')}} #mytable");
                alert("Permission for selected user is disabled");
                location.reload();
            },
        });
    });
});
var checkedArray = [];
$("#btn_all_dis").click(function (e) {
    e.preventDefault();
    if (checkedArray.length >= 1) {
        $.ajax({
            type: "post",
            url: "user-permission",
            data: { userid: checkedArray, signal: -1 },
            success: function (response) {
                alert("Permission for selected user is diabled");
                location.reload();
            },
        });
    } else {
        alert("Please select one of the rows available");
    }
});

$("#btn_all_enab").click(function (e) {
    e.preventDefault();
    if (checkedArray.length >= 1) {
        $.ajax({
            type: "post",
            url: "user-permission",
            data: { userid: checkedArray, signal: 1 },
            success: function (response) {
                alert("Permission for selected user is enabled");
                location.reload();
            },
        });
    } else {
        alert("Please select one of the rows available");
    }
});

$(".sel_usrs_enab").change(function (e) {
    e.preventDefault();
    if (this.checked) {
        checkedArray.push($(this).data("id"));
    } else {
        checkedArray.splice(checkedArray.indexOf(this.id), 1);
    }
    console.log(checkedArray.length);
});
$(".sel_usrs_dis").change(function (e) {
    e.preventDefault();
    if (this.checked) {
        checkedArray.push($(this).data("id"));
    } else {
        checkedArray.splice(checkedArray.indexOf(this.id), 1);
    }
    console.log(checkedArray.length);
});

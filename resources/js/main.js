// login page script

// Show password Icon
$('#togglePassword').on('click', function() {
    if ($("#password").attr("type") == "password") {
        //Change type attribute
        $("#password").attr("type", "text");
    } else {
        //Change type attribute
        $("#password").attr("type", "password");
    }
    $(this).toggleClass('fa-eye-slash');
});

// Admin page Script
$('#committeeBtn').on('click', function() {
    $('.createCommittee').show();
    $('#committeeBtn').hide();
});

// Excel Sheet Upload Page Script

$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

// Sweet Alert
function assignedAlert() {
    Swal.fire({
        title: 'The user has been assigned to the following designation!',
        icon: 'success',
        showCloseButton: false,
        showDenyButton: false
    });
}

// Feed page Script
$('#postBtn').on('click', function() {
    $('#post').show();
    $('#postBtn').hide();
});

// Rejected Request page Script
$('.dismissBtn').on('click', function() {
    $('.rejected').hide();
});
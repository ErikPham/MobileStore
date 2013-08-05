$(document).ready(function() {
    $(".del").click(function() {
        if (!confirm("Bạn có chắc chắn xóa không?")) {
            return false;
        }
    });
});


$(document).ready(function() {
    $(".del").click(function() {
        if (!confirm("Bạn có chắc chắn xóa không?")) {
            return false;
        }
    });

    $(".update").click(function(){
       if (!confirm("Bạn có chắc chắn xử lý tin này không?")) {
            return false;
        } 
    });
});


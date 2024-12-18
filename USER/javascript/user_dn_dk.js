function kiemtra() {
    var ten = document.getElementById("username").value;
    var matkhau = document.getElementById("userpassword").value;
    var isValid = true;
    var errorMsg = "";

    if (ten === "") {
        isValid = false;
        errorMsg += "Họ tên bắt buộc nhập.\n";
    }

    if (matkhau === "") {
        isValid = false;
        errorMsg += "Mật khẩu bắt buộc nhập.\n";
    }

    if (isValid) {
        var info = "Thông tin người dùng: " + ten;
        var newWindow = window.open("", "_blank");
        newWindow.document.write("<pre>" + info + "</pre>");
    } else {
        alert(errorMsg);
    }
}

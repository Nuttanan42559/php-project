function editnews() {
  swal({
    title: "เเก้ไขข้อมูล",
    text: "ใส่ข้อมูลที่ต้องการเเก้ไข",
    type: "input",
    showCancelButton: true,
    closeOnConfirm: false,
    inputPlaceholder: "เขียนข้อมูล"
  }, function(inputValue) {
    if (inputValue === false) return false;
    if (inputValue === "") {
      swal.showInputError("You need to write something!");
      return false
    }
    swal("Nice!", "", "success");
  });
}

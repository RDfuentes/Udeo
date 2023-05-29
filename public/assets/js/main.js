function toggle(key) {
    var all = document.getElementsByName("" + key + "");
    var checkboxes = document.querySelectorAll("[id=" + key + "]");
    if (all[0].checked == true) {
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = true;
        }
    } else {
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = false;
        }
    }
}

function confirmDelete(id,status,module){

    var action = (status === 0) ? 'habilitar' : 'inhabilitar';
  
    Swal.fire({
      text: '¿Está seguro que desea ' + action + ' ' + module + '?',
      icon: 'info',
      showCancelButton: true,
      cancelButtonColor: '#d33',
      confirmButtonColor: '#696cff',
      cancelButtonText: 'No',
      confirmButtonText: 'Si',
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById("delete_form_" + id).submit();
      }
    })
  }
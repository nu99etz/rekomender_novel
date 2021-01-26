
// DataTables Handler

let DataTables = (_url, _table_id, token_name, token) => {
  let table = $(_table_id).DataTable({
    language: {
      "decimal": "",
      "emptyTable": "Data kosong",
      "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
      "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
      "infoFiltered": "(hasil dari _MAX_ total data)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Menampilkan _MENU_ data",
      "loadingRecords": "Memuat...",
      "processing": "Memproses...",
      "search": "Cari:",
      "zeroRecords": "Tidak ada data yang sesuai",
      "paginate": {
        "first": "Pertama",
        "last": "Terakhir",
        "next": "Selanjutnya",
        "previous": "Sebelumnya"
      },
      "aria": {
        "sortAscending": ": mengurutkan dari terkecil",
        "sortDescending": ": mengurutkan dari terbesar"
      }
    },
    scrollX: true,
    processing: true,
    serverSide: true,
    order: [],
    ajax: {
      url: _url,
      type: "POST",
      data: function (d) {
        d.token_name = token;
      }
    },
    lengthMenu: [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],
    columnDefs: [{
      targets: [0],
      orderable: false
    }
    ],
  });
}

// Send Data Handler

let SendData = (_url, _data, _form_id, _select2 = null, _modal, _table) => {
  $.ajax({
    url: _url,
    method: "POST",
    data: _data,
    contentType: false,
    cache: false,
    processData: false,
    dataType: "json",
    success: function (data) {
      if (data.status == 'notvalid') {
        toastr.error(data.messages);
      } else if (data.status == 'failed') {
        toastr.error(data.messages);
      } else if (data.status == 'success') {
        toastr.success(data.messages);
        _modal.modal('hide');
        _form_id[0].reset();
        if (_select2 != null) {
          $.each(_select2, function (i, val) {
            val.val('').trigger('change');
          });
        }
        _table.DataTable().ajax.reload();
      }
    },
    error: function (xhr, error) {
      console.log(error);
      toastr.error("Error" + xhr.responseText);
    }
  });
}

// Go Rating Handler

let goRatingAct = (_url, _table) => {
  $.ajax({
    url: _url,
    method: "POST",
    data: _data,
    contentType: false,
    cache: false,
    processData: false,
    dataType: "json",
    success: function (data) {
      if (data.status == 'failed') {
        toastr.error(data.messages);
      } else if (data.status == 'success') {
        var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        Toast.fire({
          icon: 'success',
          title: data.messages
        });
        _table.DataTable().ajax.reload();
      }
    },
    error: function (xhr, error) {
      console.log(error);
      toastr.error("Error" + xhr.responseText);
    }
  });
}

// Delete Handler

let DeleteData = (_url, _table) => {
  Swal.fire({
    title: 'Apakah Anda Yakin Menghapus Data Ini ?',
    // showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: `Hapus`,
    confirmButtonColor: '#d33',
    // denyButtonText: `Kembali`,
    icon: 'question'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: _url,
        method: "POST",
        dataType: "json",
        success: function (data) {
          if (data.status == 'success') {
            Swal.fire(data.header, data.messages, 'success')
            _table.DataTable().ajax.reload();
          } else if (data.status == 'failed') {
            Swal.fire(data.header, data.messages, 'error')
          }
        }
      })
    } else {
      Swal.fire('Changes are not saved', '', 'info')
    }
  });
}

// Select2 AJAX Handler

let Select2Custom = (_select2_data) => {
  $.each(_select2_data, function (i, value) {
    value[0].select2({
      allowClear: true,
      placeholder: value[1],
      ajax: {
        url: value[2],
        dataType: "json",
        processResults: function (data) {
          return {
            results: data
          }
        }
      },
      theme: "bootstrap4",
    });
  })
}

// DateRange Picker Handler

let DateRangePicker = (_elem) => {
  $.each(_elem, function (i, value) {
    value.daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      autoApply: true,
      locale: {
        format: 'YYYY/MM/DD',
      }
    });
  });
}


// Submit Form Handler

let goSubmit = (_data, _url, _redirect) => {
  $.ajax({
    url: _url,
    method: "POST",
    data: _data,
    contentType: false,
    cache: false,
    processData: false,
    dataType: "json",
    success: function (data) {
      if (data.status == 'notvalid') {
        toastr.error(data.messages);
      } else if (data.status == 'failed') {
        toastr.error(data.messages);
      } else if (data.status == 'success') {
        toastr.success(data.data);
        // Swal.fire({
        //   type: 'success',
        //   title: "Penambahan Data Sukses",
        //   text: data.messages,
        //   timer: 3000,
        //   icon: 'success',
        //   showCancelButton: false,
        //   showConfirmButton: false
        // }).then(function () {
        //   window.location.href = _redirect;
        // });
      }
    },
    error: function (xhr, error) {
      console.log(error);
      toastr.error("Error" + xhr.responseText);
    }
  });
}

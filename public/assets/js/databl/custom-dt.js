function customDt(selector, uRL, data = {}, columns = [],order_=0) {
    db_table = $(selector).DataTable({
        serverSide: true,
        stateSave: false,
      ajax: {
        url: uRL,
        data: data,
        beforeSend: function () {
            showloader();
        },
        complete: function () {
            hideloader();

        },

      },
      columns: columns,
      order: [order_, 'desc'],
      drawCallback: function (settings, json) {
        $('#loader').addClass('d-none');
        $('[rel="tooltip"]').tooltip();
      },

    })
  }

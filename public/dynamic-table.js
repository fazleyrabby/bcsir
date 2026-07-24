var Script = function () {
        $('#sample_1').DataTable({
            "language": {
                "lengthMenu": "_MENU_ records per page",
                "paginate": {
                    "previous": "Prev",
                    "next": "Next"
                }
            },
            "columnDefs": [{
                "orderable": false,
                "targets": [0]
            }]
        });

        $('#sample_1 .group-checkable').change(function () {
            var set = $(this).attr("data-set");
            var checked = $(this).is(":checked");
            $(set).each(function () {
                if (checked) {
                    $(this).prop("checked", true);
                } else {
                    $(this).prop("checked", false);
                }
            });
        });

        $('#sample_1_wrapper .dataTables_filter input').addClass("form-control"); // modify table search input
        $('#sample_1_wrapper .dataTables_length select').addClass("form-select"); // modify table per page dropdown
    }();
    
    
    }();
    
    // Initialize DataTables for sample_1 (first table)
    $('#sample_1').DataTable({
        "language": {
            "lengthMenu": "_MENU_ records per page",
            "paginate": {
                "previous": "Prev",
                "next": "Next"
            }
        },
        "columnDefs": [{
            "orderable": false,
            "targets": [0]
        }]
    });
    
    // Handle checkbox group for sample_1
    $('#sample_1 .group-checkable').change(function () {
        var set = $(this).attr("data-set");
        var checked = $(this).is(":checked");
        $(set).each(function () {
            $(this).prop("checked", checked);
        });
    });
    
    // Apply custom styling to sample_1
    $('#sample_1_wrapper .dataTables_filter input').addClass("form-control"); // modify table search input
    $('#sample_1_wrapper .dataTables_length select').addClass("form-select"); // modify table per page dropdown
    
    // Initialize DataTables for example2 (second table)
    $('#example2').DataTable({
        "language": {
            "lengthMenu": "_MENU_ records per page",
            "paginate": {
                "previous": "Prev",
                "next": "Next"
            }
        },
        "columnDefs": [{
            "orderable": false,
            "targets": [0]
        }]
    });
    
    // Handle checkbox group for example2
    $('#example2 .group-checkable').change(function () {
        var set = $(this).attr("data-set");
        var checked = $(this).is(":checked");
        $(set).each(function () {
            $(this).prop("checked", checked);
        });
    });
    
    // Apply custom styling to example2
    $('#example2_wrapper .dataTables_filter input').addClass("form-control"); // modify table search input
    $('#example2_wrapper .dataTables_length select').addClass("form-select"); // modify table per page dropdown

        // Initialize DataTables for sample_2 (third table)
        $('#sample_2').DataTable({
            "language": {
                "lengthMenu": "_MENU_ per page",
                "paginate": {
                    "previous": "Prev",
                    "next": "Next"
                }
            },
            "columnDefs": [{
                "orderable": false,
                "targets": [0]
            }]
        });

        // Handle checkbox group for sample_2
        $('#sample_2 .group-checkable').change(function () {
            var set = $(this).attr("data-set");
            var checked = $(this).is(":checked");
            $(set).each(function () {
                $(this).prop("checked", checked);
            });
        });

        // Apply custom styling to sample_2
        $('#sample_2_wrapper .dataTables_filter input').addClass("form-control"); // modify table search input
        $('#sample_2_wrapper .dataTables_length select').addClass("form-select"); // modify table per page dropdown

        // Initialize DataTables for sample_3 (fourth table)
        $('#sample_3').DataTable({
            "language": {
                "lengthMenu": "_MENU_ per page",
                "paginate": {
                    "previous": "Prev",
                    "next": "Next"
                }
            },
            "columnDefs": [{
                "orderable": false,
                "targets": [0]
            }]
        });

        // Handle checkbox group for sample_3
        $('#sample_3 .group-checkable').change(function () {
            var set = $(this).attr("data-set");
            var checked = $(this).is(":checked");
            $(set).each(function () {
                $(this).prop("checked", checked);
            });
        });

        // Apply custom styling to sample_3
        $('#sample_3_wrapper .dataTables_filter input').addClass("form-control"); // modify table search input
        $('#sample_3_wrapper .dataTables_length select').addClass("form-select"); // modify table per page dropdown
    }();
$(document).ready(function () {

    var ONI = {};
    ONI.ui || (ONI.ui = {});

    ONI.ui.productCategory = {

        tableSelector : ".data-table-oni-product",
        tableConfig:{
            processing: true,
            serverSide: true,
            ajax: {
                url: "http://onisystem.local/app_dev.php/admin/ajax/products",
            },
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'url'},
                {data: 'parent'},
                {
                    data: null,
                    orderable:      false,
                    data:           null,
                    defaultContent: ""
                }
            ],
            createdRow: function (row, data, index) {

                if ($('template[data-table-oni-product-options]').length) {

                    var tableOptionsHtml = $('template[data-table-oni-product-category-options]').html();
                    tableOptionsHtml = tableOptionsHtml.toString().replace(/{productCategoryId}/g, data['id']).replace(/{name}/g, data['name']);
                    var tableOptionsElement = $(tableOptionsHtml);
                    $('td', row).eq(-1).html(tableOptionsElement);

                }

            }
        },

        init: function (config) {
            this.buildDataTable()
        },
        buildDataTable: function () {
            $(this.tableSelector).dataTable(this.tableConfig);

        }
    };

    ONI.ui.productCategory.init();

});


ONI.ui || (ONI.ui = {});
ONI.ui.product || (ONI.ui.product = {});

var ProductDataTable;

ONI.ui.product.dataTable = ProductDataTable = Class.create(ONI, {

    tableSelector: ".data-table-oni-product",
    tableConfig: {
        processing: true,
        serverSide: true,
        ajax: {
            url: Routing.generate('oni_ajax_get_products'),
        },
        columns: [
            {data: 'id'},
            {data: 'name'},
            {data: 'url'},
            {data: 'parent'},
            {
                data: null,
                orderable: false,
                data: null,
                defaultContent: ""
            }
        ],
        createdRow: function (row, data, index) {

            if ($('template[data-table-oni-product-options]').length) {

                var tableOptionsHtml = $('template[data-table-oni-product-options]').html();
                tableOptionsHtml = tableOptionsHtml.toString().replace(/{productCategoryId}/g, data['id']).replace(/{name}/g, data['name']);
                var tableOptionsElement = $(tableOptionsHtml);
                $('td', row).eq(-1).html(tableOptionsElement);2

            }

        }
    },
    initialize: function (config) {
        this.buildDataTable()
    },
    buildDataTable: function () {
        $(this.tableSelector).dataTable(this.tableConfig);

    }
});





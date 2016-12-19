$(document).ready(function () {

    ONI.ui || (ONI.ui = {});

    ONI.ui.productCategory = {
        tableSelector : ".data-table-oni-product-categories",
        tableConfig:{
            processing: true,
            serverSide: true,
            ajax: {
                url: ONI.configurePath("/admin/ajax/product/categories"),
            },
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'url'},
                {data: 'parent'},
                {data: 'updatedBy'},
                {data: 'updatedAt'},
                {
                    data: null,
                    orderable:      false,
                    data:           null,
                    defaultContent: ""
                }
            ],
            createdRow: function (row, data, index) {

                if ($('template[data-table-oni-product-category-options]').length) {

                    var tableOptionsHtml = $('template[data-table-oni-product-category-options]').html();
                    tableOptionsHtml = tableOptionsHtml.toString().replace(/{productCategoryId}/g, data['id']).replace(/{productCategoryName}/g, data['name']);
                    var tableOptionsElement = $(tableOptionsHtml);
                    $('td', row).eq(-1).html(tableOptionsElement);

                }

            }
        },

        init: function () {
            this.buildDataTable()
        },
        buildDataTable: function () {
            $(this.tableSelector).dataTable(this.tableConfig);

        }
    };

    ONI.ui.productCategory.init();

});


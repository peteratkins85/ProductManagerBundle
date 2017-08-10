ONI.ui || (ONI.ui = {});
ONI.ui.product || (ONI.ui.product = {});

ONI.ui.product.dataTable = ProductDataTable = Class.create(ONI.ui.dataTable, {
    buildDataTable: function () {
        var config = {
            processing: true,
            serverSide: true,
            ajax: {
                url: Routing.generate('oni_ajax_get_products'),
            },
            columns: this.columns,
            createdRow: $.proxy(this.createdRow, this),
            columnDefs: [ {
                targets: 4,
                createdCell: function (td, cellData, rowData, row, col) {
                    if ( cellData === true ) {
                        $(td).html('<input class="btn btn-success btn-mini" style="margin-bottom:5px" value="Enabled" type="button">');
                    } else {
                        $(td).html('<input class="btn btn-danger btn-mini" style="margin-bottom:5px" value="Disabled" type="button">');
                    }
                }
            } ]
        };

        $(this.selector).dataTable(config);
    },
    createdRow: function (row, data, index) {
        var _this = this;

        if (_this.rowOptionsTemplate.length > 0) {
            var tableOptionsHtml = _this.rowOptionsTemplate.html();
            tableOptionsHtml = tableOptionsHtml.toString().replace(/{id}/g, data['id']).replace(/{name}/g, data['name']);
            tableOptionsHtml = tableOptionsHtml.toString().replace(/{type}/g, data['productTypeId']);
            var tableOptionsElement = $(tableOptionsHtml);
            $('td', row).first().html(tableOptionsElement);
        }
    }
});

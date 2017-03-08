ONI.ui || (ONI.ui = {});
ONI.ui.productCategory || (ONI.ui.productCategory = {});

ONI.ui.productCategory.dataTable = ProductCatagoryDataTable = Class.create(ONI.ui.dataTable, {
    buildDataTable: function () {
        var config = {
            processing: true,
            serverSide: true,
            ajax: {
                url: Routing.generate('oni_ajax_get_product_categories'),
            },
            columns: this.columns,
            createdRow: $.proxy(this.createdRow, this)
        };

        $(this.selector).dataTable(config);
    },
    createdRow: function (row, data, index) {
        var _this = this;

        if (_this.rowOptionsTemplate.length > 0) {
            var tableOptionsHtml = _this.rowOptionsTemplate.html();
            tableOptionsHtml = tableOptionsHtml.toString().replace(/{id}/g, data['id']).replace(/{name}/g, data['name']);
            var tableOptionsElement = $(tableOptionsHtml);
            $('td', row).first().html(tableOptionsElement);
        }

    }
});

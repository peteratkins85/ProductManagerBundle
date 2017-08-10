ONI.ui || (ONI.ui = {});
ONI.ui.productCategory || (ONI.ui.productCategory = {});

var TreeSelector;

ONI.ui.productCategory.TreeSelector = ProductCategoryTreeSelector = Class.create(ONI, {
    container: null,
    config: null,
    selector: '.js-tree',
    attachedSelectElement: null,
    attachedSelected: null,
    inputName: null,
    selected: [],
    jsTreeInstance: null,
    inputDataElementId: 'data-tree-input',
    url: Routing.generate('oni_ajax_get_product_categories_hierarchy'),
    treeConfig: {},
    _hasAttachedSelectElement: function () {
        return (this.attachedSelectElement !== null);
    },
    initialize: function (config) {
        if (typeof config === "undefined" || typeof config.container === "undefined") {
            throw new Error('container must be set');
        }

        this.config = config;
        this.container = $(this.config.container);

        if (typeof this.config.attachedSelectId !== "undefined" && $(this.config.attachedSelectId).length > 0){
            this.attachedSelectElement = $(this.config.attachedSelectId);
        }

        if (this.container.data('input-name').length > 0){
            this.inputName = this.container.data('input-name');
        }

        if (this.container.data('selected').length > 0){
            this.selected = this.container.data('selected');
        }

        this.initTree();

    },
    initTree: function () {

        var _this = this;

        if ($(_this.selector, _this.container).length) {
            $.ajax({
                url: _this.url,
                dataType: "json",
            }).done(function (data) {

                $(_this.selector, _this.container)
                    .on('check_node.jstree', $.proxy(_this.checkNodeAction, _this))
                    .on('uncheck_node.jstree', $.proxy(_this.unCheckNodeAction, _this))
                    .on('ready.jstree', $.proxy(_this.onJsTreeReady, _this))
                    .jstree({
                        "plugins": ["checkbox"],
                        "checkbox": {
                            "tie_selection": false
                        },
                        'core': {
                            'data': data
                        }
                    });

                _this.jsTreeInstance = $.jstree.reference($(_this.selector, _this.container));

            });
        } else {
            throw new Error('selector must be set');
        }
    },
    onJsTreeReady: function(){

        var _this = this;

        if (_this._hasAttachedSelectElement()){
            _this.attachedSelectElement.find('option').remove();
        }

        var JsTree = $.jstree.reference($(_this.selector, _this.container));

        if (_this.selected.length > 0) {
            $.each(_this.selected, function (index, select) {
                JsTree.check_node(select);
            });
        }

    },
    nodeHasNoCheckedChildren: function (nodeId) {
        var _this = this;
        var node =  _this.jsTreeInstance.get_node(nodeId);

        $.each(node.children, function(index, child){
             if (_this.jsTreeInstance.is_checked(child)){
                 return false;
             }
        });

        return nodeId;

    },
    checkNodeAction: function (e, data) {
        var _this = this;
        var children = data.node.children_d;
        var node = data.node;
        var selections = [];
        var container = _this.container;
        selections.push(node);

        if (_this.inputName) {
            container.append('<input type="hidden" ' + _this.inputDataElementId + '="' + node.id + '" value="' + node.id + '" name="' + _this.inputName + '" />');

            $.each(children, function (index, id) {
                if ($('input[' + _this.inputDataElementId + '="' + id + '"]').length < 1) {
                    var currentNode = data.instance.get_node(id);
                    selections.push(currentNode);
                    container.append('<input type="hidden" ' + _this.inputDataElementId + '="' + currentNode.id + '" value="' + currentNode.id + '" name="' + _this.inputName + '" />')
                }
            });
        }

        if (_this.attachedSelectElement){
            $.each(selections, function(index, category){
                var option = new Option(category.text, category.id);
                var defaultCategorySelector = _this.attachedSelectElement;

                if (_this.attachedSelected !== null &&  _this.attachedSelected.id == category.id) {
                    option.selected = true;
                    _this.attachedSelected = null;
                }

                if ($('option[value="'+category.id+'"]',defaultCategorySelector).length < 1) {
                    defaultCategorySelector.append(option);
                    defaultCategorySelector.trigger("change");
                }
            });
        }

    },
    unCheckNodeAction: function (e, jsTree) {
        var _this = this;
        var children = jsTree.node.children_d;
        var container = _this.container;
        var nodeId = jsTree.node.id;
        var unChecked = [];

        if (_this.inputName) {
            $('input[' + _this.inputDataElementId + '="' + nodeId + '"]', container).remove();
            unChecked.push(jsTree.node);

            if (_this.nodeHasNoCheckedChildren(jsTree.node.parent)) {
                unChecked.push(jsTree.instance.get_node(jsTree.node.parent));
                if ($('input[' + _this.inputDataElementId + '="' + jsTree.node.parent + '"]', container).length > 0) {
                    $('input[' + _this.inputDataElementId + '="' + jsTree.node.parent + '"]', container).remove();
                }
            }

            $.each(children, function (index, id) {
                if ($('input[' + _this.inputDataElementId + '="' + id + '"]', container).length > 0) {
                    unChecked.push(jsTree.instance.get_node(id));
                    $('input[' + _this.inputDataElementId + '="' + id + '"]', container).remove();
                }
            });
        }

        if (unChecked.length > 0 && _this.attachedSelectElement !== null) {
            var defaultCategorySelector = _this.attachedSelectElement;

            $.each(unChecked, function(index, category){
                if ($('option[value="'+category.id+'"]',defaultCategorySelector).length > 0) {
                    $('option[value="'+category.id+'"]',defaultCategorySelector).remove();
                    defaultCategorySelector.trigger("change");
                }
            });
        }

    }
});








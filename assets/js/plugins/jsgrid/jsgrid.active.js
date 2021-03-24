
    
    $('#grid_table').jsGrid({


            height: "610px",
            width: "100%",
            filtering: true,
            editing: true,
            inserting: true,
            sorting: true,
            paging: true,
            autoload: true,
            pageSize: 10,
            pageButtonCount: 5,
            deleteConfirm: "Do you really want to delete the client?",
            controller: 
                loadData: function(filter){
                    return $.ajax({
                    type: "GET",
                    url: "configtable.php",
                    data: filter
                    });
                },

                insertItem: function(item){
                    return $.ajax({
                    type: "POST",
                     url: "configtable.php",
                    data:item
                     });
                 },
                 updateItem: function(item){
                    return $.ajax({
                    type: "PUT",
                    url: "configtable.php",
                    data: item
                    });
                },
                deleteItem: function(item){
                    return $.ajax({
                    type: "DELETE",
                    url: "configtable.php",
                    data: item
                    });
                },
            },

            fields: [
                {
                    name: "id_maquinas",
        type: "hidden",
        css: 'hide'
            },
            {
            name: "Nome", 
        type: "text", 
        width: 150, 
        validate: "required"
            },
            {
            name: "matricula", 
        type: "text", 
        width: 150, 
        validate: "required"
            },
            {
            name: "combustivel", 
        type: "text", 
        width: 50, 
        validate: function(value)
        {
            if(value > 0)
            {
                return true;
            }
        }
            },
           {
            name: "ano", 
        type: "number", 
        width: 150, 
        validate: "required"
            },
            {
            name: "km", 
        type: "number", 
        width: 150, 
        validate: "required"
            },
            {
            name: "h", 
        type: "number", 
        width: 150, 
        validate: "required"
            },
            {
            name: "km_iniciais", 
        type: "number", 
        width: 150, 
        validate: "required"
            },
            {
            name: "h_iniciais", 
        type: "number", 
        width: 150, 
        validate: "required"
            },
            {
            name: "observacoes", 
        type: "text", 
        width: 150, 
        validate: "required"
            },
        valueField: "id_maquinas", 
        textField: "Nome", 
        validate: "required"
            },
            {
                type: "control"
            }
        ]

    });
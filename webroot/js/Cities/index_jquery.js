function getCities(){
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
            function (data) {
                var cityTable = $('#cityData');
                cityTable.empty();
                    $.each(data.cities, function (key, value)
                    {
                        var editDeleteButtons = '</td><td>' +
                                '<a href="javascript:void(0);" class="btn btn-warning" rowID="' +
                                    value.id + 
                                    '" data-type="edit" data-toggle="modal" data-target="#modalCityAddEdit">' + 
                                    'edit</a>' +
                                '<a href="javascript:void(0);" class="btn btn-danger"' +
                                    'onclick="return confirm(\'Are you sure to delete data?\') ?' + 
                                    'cityAction(\'delete\', \'' + 
                                    value.id + 
                                    '\') : false;">delete</a>' +
                                '</td></tr>';
                        cityTable.append('<tr><td>' + value.id + '</td><td>' + value.name + editDeleteButtons);
                    });
            }
    });
}

function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}

function cityAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var cityData = '';
    var ajaxUrl = urlToRestApi;
    frmElement = $("#modalCityAddEdit");
    if (type == 'add') {
        requestType = 'POST';
        cityData = convertFormToJSON(frmElement.find('form'));
    } else if (type == 'edit') {
        requestType = 'PUT';
        cityData = convertFormToJSON(frmElement.find('form'));
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    frmElement.find('.statusMsg').html('');
    $.ajax({
        type: requestType,
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(cityData),
        success: function (msg) {
            if (msg) {
                frmElement.find('.statusMsg').html('<p class="alert alert-success">City data has been ' + statusArr[type] + ' successfully.</p>');
                getCities();
                if (type == 'add') {
                    frmElement.find('form')[0].reset();
                }
            } else {
                frmElement.find('.statusMsg').html('<p class="alert alert-danger">Some problem occurred, please try again.</p>');
            }
        }
    });
}

function editCity(id) {
    $.ajax({
        type: 'POST',
        url: 'cityAction.php',
        dataType: 'JSON',
        data: 'action_type=data&id=' + id,
        success: function (data) {
            $('#id').val(data.id);
            $('#name').val(data.name);
        }
    });
}

$(function () {
    $('#modalCityAddEdit').on('show.bs.modal', function (e) {
        var type = $(e.relatedTarget).attr('data-type');
        var cityFunc = "cityAction('add');";
        $('.modal-title').html('Add new city');
        if (type == 'edit') {
            cityFunc = "cityAction('edit');";
            $('.modal-title').html('Edit city');
            var rowId = $(e.relatedTarget).attr('rowID');
            editCity(rowId);
        }
        $('#citySubmit').attr("onclick", cityFunc);
    });

    $('#modalCityAddEdit').on('hidden.bs.modal', function () {
        $('#citySubmit').attr("onclick", "");
        $(this).find('form')[0].reset();
        $(this).find('.statusMsg').html('');
    });
});

$(document).ready(function () {
    $('#food-group-id').on('change', function () {
        var foodGroupId = $(this).val();
        if(foodGroupId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'food_group_id=' + foodGroupId,
                success: function (foodProducts) {
                    $select = $('#food-product-id');
                    $select.find('option').remove();
                    $.each(foodProducts, function (key, value) {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.name + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#food-product-id').html('<option value="">Select FoodGroup first</option>');
        }
    });
});
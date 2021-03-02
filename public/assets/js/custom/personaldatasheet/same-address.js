$('#same-as-above').change(function (e) {
    if($('#same-as-above').is(':checked')) {
        // Copy the value of residential address to permanent address.
        $('#permanent_lotno').val($('#lotno').val())
                            .prop('readonly', true);
        $('#permanent_street').val($('#street').val())
                            .prop('readonly', true);
        $('#permanent_subdivision').val($('#subdivision').val())
                            .prop('readonly', true);
        $('#permanent_barangay').val($('#barangay').val())
                            .prop('readonly', true);
        $('#permanent_city').val($('#city').val())
                            .prop('readonly', true);
        $('#permanent_province').val($('#province').val())
                            .prop('readonly', true);
        $('#permanent_zipcode').val($('#zipcode').val())
                            .prop('readonly', true);
    } else {
        $('#permanent_lotno').val('')
                            .prop('readonly', false);
        $('#permanent_street').val('')
                            .prop('readonly', false);
        $('#permanent_subdivision').val('')
                            .prop('readonly', false);
        $('#permanent_barangay').val('')
                            .prop('readonly', false);
        $('#permanent_city').val('')
                            .prop('readonly', false);
        $('#permanent_province').val('')
                            .prop('readonly', false);
        $('#permanent_zipcode').val('')
                            .prop('readonly', false);
    }
});
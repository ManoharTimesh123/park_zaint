import DecoupledEditor from '@ckeditor/ckeditor5-build-decoupled-document';
import select2 from 'select2';
import 'select2/dist/css/select2.min.css';
select2();

$(function() {
    // For create/edit airports and its terminals
    $('#add_terminal').on('click', function () {
        let terminal_name = document.getElementById("terminal_name").value;
        let terminal_shortname = document.getElementById("shortname").value;
        let terminal_status = document.getElementById("terminal_status").value;

        if (terminal_name != '' && terminal_shortname != '') {
            insertAfter(document.getElementById('terminals'), '<div class="d-flex justify-content-end"><span class="col-3"><input required value="' + terminal_name + '" type="text" name="terminal_name[]" id="terminal_name[]" class="shadow-none form-control"></span><span class="col-3"><input required value="' + terminal_shortname + '" type="text" name="terminal_shortname[]" id="terminal_shortname[]" class="shadow-none form-control"></input></span><span class="col-3"><select class="form-select" name="terminal_status[]"><option value="1" ' + (terminal_status == 1 ? 'selected' : '') + '>Active</option><option value="0" ' + (terminal_status == 0 ? 'selected' : '') + '>Inactive</option></select></span></div>');
        }

        document.getElementById("terminal_name").value = '';
        document.getElementById("shortname").value = '';
        document.getElementById("terminal_status").value = 1;
    });

    function insertAfter(el, htmlString) {
        el.insertAdjacentHTML('afterend', htmlString);
    }

    $('#airport_submit').on('click', function (event) {
        event.preventDefault();

        document.getElementById("description").value = editor.getData();

        var name_create = $("input[name='terminal_name[]']");

        let new_items = [];
        name_create.each(function(index) {
            let shortname = $("input[name='terminal_shortname[]']").eq(index).val();
            let status = $("select[name='terminal_status[]']").eq(index).val();
            new_items.push({
                'name': $(this).val(),
                'shortname' : shortname,
                'status' : status
            });
        });

        var ids = $("input[name='terminal_update_ids[]']");

        let update_items = [];
        ids.each(function(index) {
            let name = $("input[name='terminal_name_update[]']").eq(index).val();
            let shortname = $("input[name='terminal_shortname_update[]']").eq(index).val();
            let status = $("select[name='terminal_status_update[]']").eq(index).val();
            update_items.push({
                'id': $(this).val(),
                'name': name,
                'shortname' : shortname,
                'status' : status
            });
        });

        new_items = JSON.stringify(new_items);
        $('#new_items').val(new_items);
        update_items = JSON.stringify(update_items);
        $('#update_items').val(update_items);

        document.airport_form.submit();
        document.airport_form.reset();
    });

    // For rich textarea.
    var editor;

    if(document.querySelector('#visual_description')) {
        DecoupledEditor
            .create(document.querySelector('#visual_description'),{
                ckfinder: {
                    uploadUrl: '/admin/upload-image?_token=' + document.head.querySelector('meta[name="csrf-token"]').content,
                }
            }).then(newEditor => {
                    editor = newEditor;
                    const toolbarContainer = document.querySelector('#toolbar-container');
                    toolbarContainer.appendChild(editor.ui.view.toolbar.element);

                    editor.model.document.on('change:data', () => {
                        setImageData();
                    });

            }).catch(error => {
                console.log(error);
            });
    }

    function setImageData() {
        $('#visual_description img').map(function() {
            let url = $(this).attr('src');
            if (url.includes('/uploads')) {
                let urlParts = url.split('/');
                let filename = urlParts[urlParts.length - 1];
                let currentImageUrls = $('#imageUrls').val();
                if (currentImageUrls!=null && currentImageUrls.indexOf(filename) === -1) {
                    $('#imageUrls').val(currentImageUrls + (currentImageUrls ? ',' : '') + filename);
                }
            }
        }).get();
    }

    // For detecting change in account type in custom datatables.
    $(document).ready(function() {
        $('#account-type-filter').on('change', function() {
            window.LaravelDataTables["customers"].column('account_type:name').search($(this).val()).draw();
        });
    });

    // For terms and conditions form
    $('#terms-and-conditions_submit').on('click', function (event) {
        event.preventDefault();
        document.getElementById("description").value = editor.getData();
        document.terms_and_conditions_form.submit();
    });

    // For multiple vehicles
    $('#add_vehicle').on('click', function (event) {
        event.preventDefault();
        let textbox = $('<br><div class="d-flex col-12 justify-content-end"><span class="col-3"><input placeholder="Vehicle reg. no." required value="" type="text" name="vehicle_reg_no[]" id="vehicle_reg_no" class="shadow-none form-control"></span><span class="col-3"><input placeholder="Vehicle maker" required value="" type="text" name="vehicle_maker[]" id="vehicle_maker" class="shadow-none form-control"></input></span><span class="col-3"><input placeholder="Vehicle model" required value="" type="text" name="vehicle_model[]" id="vehicle_model" class="shadow-none form-control"></input></span><span class="col-3"><input placeholder="Vehicle colour" required value="" type="text" name="vehicle_color[]" id="vehicle_color" class="shadow-none form-control"></input></span></div>');
        $("#vehicles").after(textbox);
    });

    $('#booking_submit').on('click', function (event) {
        event.preventDefault();

        var vehicle_create = $("input[name='vehicle_reg_no[]']");

        let new_items = [];
        vehicle_create.each(function(index) {
            let maker = $("input[name='vehicle_maker[]']").eq(index).val();
            let model = $("input[name='vehicle_model[]']").eq(index).val();
            let color = $("input[name='vehicle_color[]']").eq(index).val();
            new_items.push({
                'reg_no': $(this).val(),
                'maker': maker,
                'model' : model,
                'color' : color
            });
        });

        new_items = JSON.stringify(new_items);
        $('#new_items').val(new_items);

        document.booking_form.submit();
        document.booking_form.reset();
    });

    $('#airport').on('change', function () {
        let selectedAirportId = $(this).val();
        if(selectedAirportId > 0) {
            inject(selectedAirportId);
        }
    });

    function inject(selectedAirportId) {
        let selectInboundElement = $('#inbound_terminal');
        let selectOutboundElement = $('#outbound_terminal');
        selectInboundElement.empty();
        selectOutboundElement.empty();

        axios.get('/admin/fetch-terminals/' + selectedAirportId)
            .then(response => {

                selectInboundElement.append('<option value="">Select Terminal</option>');
                selectOutboundElement.append('<option value="">Select Terminal</option>');
                response.data.airportterminals.forEach(item => {
                    selectInboundElement.append(`<option value="${item.id}">${item.name}</option>`);
                    selectOutboundElement.append(`<option value="${item.id}">${item.name}</option>`);
                });

            })
            .catch(error => {
                console.error(error.response ? error.response.data : error.message);
            });
    }
    $('#addons_id').select2({
        placeholder: 'Search addon'
    });

    // For booking notes
    var note_count = 1;

    $(document).on('click', '.note-submit', function () {
        let textareaValue = $(this).closest('span').find('.note').val();

        let booking_id = $('#booking_id').val()
        let data = {
            booking_id: booking_id,
            description: textareaValue
        };

        axios.post('/admin/add-note', data)
            .then(function () {
                location.reload();
            })
            .catch(function (error) {
                console.error(error);
            });
    });

    if (performance.navigation.type === 1) {
        setTimeout(function() {
            var targetDiv = document.getElementById('add_note_btn');
            if (targetDiv) {
                targetDiv.scrollIntoView({ behavior: 'smooth' });
            }
        }, 100);
    }

    $(document).on('click', '.note-edit', function (event) {
        event.preventDefault();

        $(this).text('');
        let $this = $(this);

        let textareaValue = $(this).closest('span').find('.note').val();

        let data = {
            id: $(this).data('id'),
            description: textareaValue
        };

        axios.put('/admin/edit-note', data)
            .then(function () {
                $this.text('Edit');
            })
            .catch(function (error) {
                console.error(error);
            });
    });

    $(document).on('click', '.note-delete', function (event) {
        event.preventDefault();

        let id = $(this).data('id');
        let $this = $(this);

        axios.delete('/admin/delete-note/'+id)
            .then(function () {
                $this.closest('.d-flex').remove();
            })
            .catch(function (error) {
                console.error(error);
            });
    });

    $('#add_note').on('click', function () {
        insertAfter(document.getElementById('notes'), '<div class="d-flex m-2"><span class="col-12"><span class=""><textarea required class="shadow-none form-control note"></textarea></span><button id="btn-'+note_count+'" class="btn btn-secondary note-submit">Submit</button></span></div>');
        note_count++;
    });

    // For bookings index filters
    $('#product-id-filter').on('change', function() {
        window.LaravelDataTables["bookings"].column('product_and_addon:name').search($(this).val()).draw();
    });

    $('#airport-id-filter').on('change', function() {
        window.LaravelDataTables["bookings"].column('airport_id:name').search($(this).val()).draw();
    });

    $('#terminal-id-filter').on('change', function() {
        window.LaravelDataTables["bookings"].column('outbound_terminal_id:name').search($(this).val()).draw();
    });

    $('#start_date').on('change', function() {
        window.LaravelDataTables["bookings"].column('travel_start_date:name').search($(this).val()).draw();
    });

    $('#end_date').on('change', function() {
        window.LaravelDataTables["bookings"].column('travel_end_date:name').search($(this).val()).draw();
    });
});

// For Adding class on body
var elements = document.getElementsByClassName('sidebar-arrow');
for (var i = 0; i < elements.length; i++) {
	elements[i].onclick = function() {
		var elem = document.body;
		elem.classList.toggle('mini-sidebar'); // Add or remove class
	};
}
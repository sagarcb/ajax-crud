$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Create task
    $('#createTaskForm').on('submit', function (e) {
        e.preventDefault();
        //form data
        let input = $('#createTaskForm input[name="name"]');
        let msg = $('#createTaskMessage');
        let formData = {
            'name': $(input).val(),
        };
        $.ajax({
            type: 'POST',
            url: "task/store",
            data: formData,
            success: function (data) {
                //request message clear
                $(msg).html('');

                //Show success message
                $(msg).append('<div class="alert alert-success">' +
                    'Task Created Successfully</div>');

                //input value clear
                $(input).val("");

                $('#taskTableBody').prepend('<tr data-id='+data.id+'>\n' +
                    '<td>'+data.id+'</td>\n' +
                    '<td class="task-name">'+data.name+'</td>\n' +
                    '<td style="width: 150px">\n' +
                    '<a href="#" data-bs-toggle="modal" data-bs-target="#editTask" class="btn btn-primary btn-sm edit">Edit</a>\n' +
                    '<a href="#" class="btn btn-danger btn-sm delete" data-id='+data.id+'>Delete</a>\n' +
                    '</td>\n' +
                    '</tr>')
            },
            error: function (error) {
                /*var err = JSON.parse(error.responseText);
                console.log(err.message);*/
                $(msg).html("");
                $(msg).append("<ul id='errorMsg' class='alert alert-danger'></ul>")

                $.each(error.responseJSON.errors, function (index, value) {
                    console.log(value[0]);
                    $(msg).find('#errorMsg').append("" +
                        "<li>"+value[0]+"</li>");
                })
            }
        })
    });
    let task= "";
    //Edit Task
    $(document).on('click', '.edit', function () {
        task = $(this).closest('tr').data('id');
        let msg = $('#editTaskMessage');
        let modal = $('#editTaskForm');
        $.ajax({
            type: 'GET',
            url: 'task/edit/'+task,
            success: function (data) {
                $(modal).find('input[name="name"]').val(data.name);
                $(modal).attr('data-id',data.id);
                $(msg).html('');
            },
            error: function (error) {
                console.log(error);
            }
        })
    });

    //Update task
    $('#editTaskForm').on('submit', function (e) {
        e.preventDefault();
        //form data
        let input = $('#editTaskForm input[name="name"]');
        let msg = $('#editTaskMessage');
        let id = task;
        let formData = {
            'name': $(input).val(),
        };
        $.ajax({
            type: 'POST',
            url: "task/update/"+id,
            data: formData,
            success: function (data) {
                //request message clear
                $(msg).html('');

                //input value clear
                $(input).val("");

                //Show success message
                $(msg).append('<div class="alert alert-success">' +
                    'Task Updated Successfully</div>');


                let taskRow = $('#taskTableBody').find('tr[data-id="'+id+'"]');
                console.log($(taskRow).find('td.task-name').text(data.name));
            },
            error: function (error) {
                /*var err = JSON.parse(error.responseText);
                console.log(err.message);*/
                $(msg).html("");
                $(msg).append("<ul id='errorMsg' class='alert alert-danger'></ul>");

                $.each(error.responseJSON.errors, function (index, value) {
                    console.log(value[0]);
                    $(msg).find('#errorMsg').append("" +
                        "<li>"+value[0]+"</li>");
                })
            }
        })
    });

    //Delete Task
    $(document).on('click','.delete', function () {
        let a = confirm("Are you sure want to delete this Todo");
        if (a === true){
            let id = $(this).attr('data-id');
            $.ajax({
                type: 'DELETE',
                url: '/task/delete/'+id,
                data: {id: id},
                success: function (data) {
                    $('#taskTableBody').find('tr[data-id="'+id+'"]').remove();
                },
                error: function (error) {
                    console.log('Failed to delete data');
                }
            });
        }
    });


});


$(document).ready(function(){

    $('#tblStudentDetails').DataTable({
        paging: false,
        searching: false,
        info: false,
        ordering: false,
        lengthChange: false,
        autoWidth: false,
        scrollCollapse: true,
        columnDefs: [
            { targets: [0, 1, 2, 3, 4, 5], className: 'text-center align-middle' },
            {
                targets:[5],
                visible:(window.userRole==='super_admin' || window.userRole==='supreme_admin')
            }
        ],
    });

    getStudentDetails();

    $('#btnAdd').click(function(e){
        e.preventDefault();

        let formData = {
            stuId: $('#txtStuId').val(),
            name: $('#txtName').val(),
            grade: $('#txtGrade').val(),
            stream: $('#textStram').val()
        }

        $.ajax({
            type:"POST",
            url: "/set-student-creation",
            data: formData,
            dataType: "json",
            success: function(response){
                console.log(response);
                alert(response.message);
                $('#frmAddStudent')[0].reset();
                getStudentDetails();
            },
            error:function(xhr, status, error){
                console.error(xhr.responseText);
                alert("Error occurred!");
            }
        });
    });

    $(document).on('click','.btnDelete',function(){
        let stuID = $(this).data('id');
        let data = {
            stuID:stuID
        }

        if(confirm('Are you sure?')){

            $.ajax({
                type:"POST",
                url:"/set-student-remove",
                dataType:"json",
                data:data,
                success:function(response){
                    alert('student Delete succussfully');
                    getStudentDetails();
                },
                error:function(xhr,status,error){
                    console.log(xhr.responseText);
                }
            });
        }
    });

    $(document).on('click','.btnUpdate',function(){
        $('#ModelUpdateStudent').modal('show');
        let rowData =$('#tblStudentDetails').DataTable().row($(this).closest('tr')).data();
        let stuid = rowData[1];
        let name = rowData[2];
        let grade = rowData[3];
        let stream = rowData[4];

        $('#txtUpdateStuId').val(stuid);
        $('#txtUpdateName').val(name);
        $('#txtUpdateGrade').val(grade);
        $('#textUpdateStram').val(stream);

        $('#hdnStuId').val(stuid);
        $('#hdnStuName').val(name);
        $('#hdnStuGrade').val(grade);
        $('#hdnStuStream').val(stream);



    });

    $(document).on('click','#btnUpdateStudent',function(e){
        e.preventDefault();
        let updatedID = $('#txtUpdateStuId').val();
        let updatedName = $('#txtUpdateName').val();
        let updatedGrade = $('#txtUpdateGrade').val();
        let updatedStream = $('#textUpdateStram').val();

        let oldID = $('#hdnStuId').val();
        let oldName = $('#hdnStuName').val();
        let oldGrade = $('#hdnStuGrade').val();
        let oldStream = $('#hdnStuStream').val();

        console.log('new ',updatedName);
        console.log('old',oldName );

        data = {
            newid:updatedID,
            newName:updatedName,
            newGrade:updatedGrade,
            newStream:updatedStream,
            oldid:oldID,
            oldname:oldName,
            oldgrade:oldGrade,
            oldstream:oldStream
        }

        $.ajax({
            type:"PUT",
            url:"/set-student-update",
            data:data,
            dataType:"json",
            success:function(response){
                if(response.status==200){
                    alert(response.message)
                    $('#ModelUpdateStudent').modal('hide');
                    getStudentDetails();
                }else{
                    alert(response.message)
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });

    //get data from DB
    function getStudentDetails(){

        $.ajax({
            type:"GET",
            url:"/get-student-details",
            dataType:"json",
            success:function(response){
                console.log(response)
                let resultSet = response
                if(resultSet.status===200){
                    let data = resultSet.resultData;
                    let formatedData = [];
                    let table = $('#tblStudentDetails').DataTable();
                    table.clear();
                    let index = 1;

                    $.each(data,function(key,row){
                        let actionButtons = '';

                        if(window.userRole === 'super_admin' || window.userRole==='supreme_admin'){
                            actionButtons += `<button class="btn btn-danger btnDelete" data-id= ${row['stu_id']}>Delete</button> `;
                            actionButtons += `<button class="btn btn-success btnUpdate">update </button>`;
                        }
                        formatedData.push([
                            index,
                            row['stu_id'],
                            row['name'],
                            row['grade'],
                            row['stream'],
                            actionButtons
                        ]);
                        index++
                    });
                    table.rows.add(formatedData).draw();
                }
            },
            error:function(xhr,status,error){
                console.log(xhr.responseText)
            }

        });

    }


});

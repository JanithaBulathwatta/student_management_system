$(document).ready(function(){
    $('#tblUserDetails').DataTable({
        paging: false,
        searching: false,
        info: false,
        ordering: false,
        lengthChange: false,
        autoWidth: false,
        scrollCollapse: true,
        columnDefs: [
            { targets: [0, 1, 2, 3, 4], className: 'text-center align-middle' },
        ],
    });
    getUserDetails();

    function getUserDetails(){
        $.ajax({
            type:"GET",
            url:"/get-user-details",
            dataType:"json",
            success:function(response){
                let result = response;
                if(result.status == 200){
                    let resultSet = result.data;
                    let formatedData = [];
                    let table = $('#tblUserDetails').DataTable();
                    table.clear();
                    let index = 1;

                    $.each(resultSet,function(key,row){
                        formatedData.push([
                            index,
                            row['name'],
                            row['email'],
                            row['role'],
                            `<button class="btn btn-danger btnDelete" data-id=${row['id']}>delete</button>
                             <button class="btn btn-success btnUpdate">update</button>`
                        ])
                        index++
                    });
                    table.rows.add(formatedData).draw();
                }
            },
            error:function(xhr){
                console.log(xhr.responseText);
            }

        });
    }

    $(document).on('click','.btnDelete',function(){
        let UserId = $(this).data('id');
        console.log('id: ',UserId);
        let data = {
            userid:UserId
        }

        if(confirm('Are you sure?')){
            $.ajax({
                type:"POST",
                url:"/set-user-delete",
                data:data,
                dataType:"json",
                success:function(response){
                    if(response.status == 200){
                        alert(response.message);
                        getUserDetails();
                    }
                    else if(response.status == 401){
                        alert(response.message);
                    }
                    else{
                        alert(response.message);
                    }
                },
                error:function(xhr){
                    console.log(xhr.responseText);
                }
            });
        }
    });
});

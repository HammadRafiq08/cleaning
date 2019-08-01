<?php include 'header.php'; ?>


    
</div>
        </div>
    </div>
    <!--#navbar-->
    <div class="container-fluid animatedParent animateOnce">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                            <div class="table-responsive">

                            <div class="container box">
                            <div class="container" style="width:100%;">
                            <br>
                            <h2>Company Details Page</h2>
  <br>
  
    <input type="text" id="search" name="search" placeholder="Search Here" class="form-control">
   
 
  <br>
    <div id="image_data">

    </div>
<br>
</div>



     
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
         
        </div>
    </div>
    <!--Add New Message Fab Button-->
   
</div>
<!-- Right Sidebar -->

<!-- /.right-sidebar -->
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<?php include 'footer.php' ?>
<div id="imageModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
                <form id="image_form" method="post" enctype="multipart/form-data">

                      <div class="form-group">
                        <label for="Enter First Name">Name</label>
                        <input class="form-control" type="text" name="name"  >
                        </div>
                        <div class="form-group">
                        <label for="Enter First Name">Phone</label>
                        <input class="form-control" type="text" name="phone"  >
                        </div>
                        <div class="form-group">
                        <label for="Enter First Name">Mobile</label>
                        <input class="form-control" type="text" name="mobile"  >
                        </div>
                        <div class="form-group">
                        <label for="Enter First Name">Address</label>
                        <input class="form-control" type="text" name="address"  >
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                        <input class="form-control" type="text" name="email"  placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                        <label for="Enter First Name">Facebook</label>
                        <input class="form-control" type="text" name="facebook"  >
                        </div>
                        <div class="form-group">
                        <label for="Enter First Name">Twitter</label>
                        <input class="form-control" type="text" name="twitter"  >
                        </div>
                        <div class="form-group">
                        <label for="Enter First Name">Instagram</label>
                        <input class="form-control" type="text" name="instagram"  >
                        </div>
                        <div class="form-group">
                        <label for="Enter First Name">Google</label>
                        <input class="form-control" type="text" name="google"  >
                        </div>

                       
                    <p><label>Select Logo</label>
                        <input type="file" name="image" id="image" /></p><br />
                    <input type="hidden" name="action" id="action" value="insert" />
                    <input type="hidden" name="image_id" id="image_id" />
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

        fetch_data();

  $("#search").on('input',function(){
           var search=$("#search").val();
           var action = "fetch";
          
         
            $.ajax({
                        url:"company_action.php",
                        method:"POST",
                        data:{search:search,action:action},
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            
                            fetch_data();
                           
                        }
                    });
        });

        function fetch_data(page)
        {
            var search=$("#search").val();
            var action = "fetch";
            $.ajax({
                url:"company_action.php",
                method:"POST",
                data:{search:search,action:action,page:page},
                success:function(data)
                {
                    $('#image_data').html(data);
                }
            })
        }
        $('#add').click(function(){
            $('#imageModal').modal('show');
            $('#image_form')[0].reset();
            $('.modal-title').text("Add Image");
            $('#image_id').val('');
            $('#action').val('insert');
            $('#insert').val("Insert");
        });
        $('#image_form').submit(function(event){
            event.preventDefault();
            var image_name = $('#image').val();
            if(image_name == '')
            {
                alert("Please Select Image");
                return false;
            }
            else
            {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert("Invalid Image File");
                    $('#image').val('');
                    return false;
                }
                else
                {
                    $.ajax({
                        url:"company_action.php",
                        method:"POST",
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            fetch_data();
                            $('#image_form')[0].reset();
                            $('#imageModal').modal('hide');
                        }
                    });
                }
            }
        });
      
        $(document).on('click', '.pagination_link', function(){  
		 $('html,body').animate({
            scrollTop: 0
        }, 900);
		$(this).addClass("page_active");
           var page = $(this).attr("id");  
           fetch_data(page);  
      });  

        $(document).on('click', '.update', function(){
            $('#image_id').val($(this).attr("id"));
            $('#action').val("update");
        
            $('#insert').val("Update");
            $('#imageModal').modal("show");
        });
        $(document).on('click', '.delete', function(){
            var image_id = $(this).attr("id");
            var action = "delete";
            if(confirm("Are you sure you want to remove this image from database?"))
            {
                $.ajax({
                    url:"company_action.php",
                    method:"POST",
                    data:{image_id:image_id, action:action},
                    success:function(data)
                    {
                        alert(data);
                        fetch_data();
                    }
                })
            }
            else
            {
                return false;
            }
        });
    });
</script>


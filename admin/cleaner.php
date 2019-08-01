    <?php include 'header.php'; ?>

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
    <script>
    
    function getSuburb(val) {
            $.ajax({
            type: "POST",
            url: "get_suburb.php",
            data:'country_id='+val,
            success: function(data){
                $("#suburb-list").html(data);
            }
            });
         }

   function getStreetname(val) {
            $.ajax({
            type: "POST",
            url: "get_streetname.php",
            data:'street_name='+val,
            success: function(data){
                $("#streetname-list").html(data);
            }
            });
         }

          function getStreetno(val) {
            $.ajax({
            type: "POST",
            url: "get_streetno.php",
            data:'street_no='+val,
            success: function(data){
                $("#streetno-list").html(data);
            }
            });
         }
         
    </script>
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
                            <h2>Cleaner Registration Page</h2>
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
    <a  class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary" name="add" id="add"><i
            class="icon-add"></i></a>
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
                        <label for="Enter First Name">Driving ID</label>
                        <input class="form-control" type="text" name="driving_id"  placeholder="Type Driving ID">
                        </div>
                         <div class="form-group">
                        <label for="Enter First Name">Primary ID</label>
                        <input class="form-control" type="text" name="pri_id"  placeholder="Type Primary ID">
                        </div>
                         <div class="form-group">
                        <label for="Enter First Name">Secondary ID</label>
                        <input class="form-control" type="text" name="sec_id"  placeholder="Type Secondary ID">
                        </div>

                      <div class="form-group">
                        <label for="Enter First Name">Name</label>
                        <input class="form-control" type="text" name="name"  placeholder="Type Name">
                        </div>
                        <div class="form-group">
                        <label for="Enter First Name">Email</label>
                        <input class="form-control" type="text" name="email"  placeholder="Type Email">
                        </div>
                        <div class="form-group">
                        <label for="Enter First Name">Phone No</label>
                        <input class="form-control" type="text" name="phone"  placeholder="Type Phone No.">
                        </div>
                        <div class="form-group">
                        <label for="Enter First Name">Mobile No.</label>
                        <input class="form-control" type="text" name="mobile"  placeholder="Type Mobile No.">
                        </div>
                        <div class="form-group">
                        <label for="Enter First Name">Address</label>
                        <textarea class="form-control" type="text" name="address" ></textarea>
                        </div>
                        <div class="form-group">
                        <label for="Enter First Name">Postal Code</label>
                        <input class="form-control" type="text" name="post_code"  placeholder="Type Postal Code">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">State</label>
                        <select class="form-control" name="state" onChange="getSuburb(this.value);">
                        <option value="">Select State/Country</option>
                        <?php
                          $query = "SELECT `name` FROM `country`";
                           $result = mysqli_query($connect, $query);
                          while($row = mysqli_fetch_array($result))
                          {
                          ?>
                           <option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
                           <?php
                          }
                           ?>
                        </select>
                        </div>

                          <div class="form-group">
                            <label for="exampleFormControlInput1">Suburb</label>
                        <select class="form-control" id="suburb-list" name="suburb" onChange="getStreetname(this.value);">
                         
                           <option value="">Select Suburb</option>
                         
                        </select>
                        </div>

                          <div class="form-group">
                            <label for="exampleFormControlInput1">Street Name</label>
                        <select class="form-control" id="streetname-list" name="street_name" onChange="getStreetno(this.value);">
                        
                           <option value="">Select Street Name</option>
                         
                        </select>
                        </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Street Number</label>
                        <select class="form-control" name="street_no" id="streetno-list">
                        
                           <option value="">Select Street Number</option>
                         
                        </select>
                        </div>
                        <div class="form-group">
                        <p><label>Police Cleance Letter Image (Top-Side)</label>
                        <input type="file" name="pimage" id="pimage" /></p><br />
                        </div>



                        <div class="form-group">
                            <label for="exampleFormControlInput1">Services</label>
                        <select class="form-control" name="service">
                          <?php
                          $query = "SELECT `name` FROM `servicecateg`";
                           $result = mysqli_query($connect, $query);
                          while($row = mysqli_fetch_array($result))
                          {
                          ?>
                           <option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
                           <?php
                          }
                           ?>
                        </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Comments</label>
                            <textarea class="ckeditor" type="text" id="usingckeditor" cols="30" rows="10" style="resize:none;"></textarea>
                       
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Active Status</label><br>
                            <label class="switch">
                                <input type="checkbox" name="status">
                                <span class="slider round"></span>
                            </label>
                        </div>

                    <p><label>Select Profile Image</label>
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
                        url:"cleaner_action.php",
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
                url:"cleaner_action.php",
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
                    var data = new FormData(this);
  
                    data.append('comments', CKEDITOR.instances['usingckeditor'].getData());
                    $.ajax({
                        url:"cleaner_action.php",
                        method:"POST",
                        data:data,
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
                    url:"cleaner_action.php",
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


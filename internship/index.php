<!DOCTYPE html>
<html>
<head>
<title>Internship Assignment</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="lib/jquery-1.11.1.min.js"></script>
  <script>
function submitForm(){

		var nm=$("#name").val();
		var cmt=$("#comment").val();

		if(nm.length==0){
		$('#error').html('please enter name');
		return;
		}

		if(cmt.length==0){
		$('#error').html('please enter comment');
		return;
		}
		
		$('#postComments').append(nm+" : "+cmt+"<hr>");
		
		var customer = {
            name: nm,
            comment:cmt
        };
		
		$("#name").val("");
		$("#comment").val("");
		
		$('#error').html('');

        $('#target').html('sending..');

        $.ajax({
            url: 'http://localhost/internship/rest/resource/CustomerResourcePOST.php',
            type: 'post',
            dataType: 'json',
            success: function (data) {
                $('#target').html(data);
            },
			error:function(data){
			$('#target').html(data);
			},
            data: JSON.stringify(customer)
        });
}  
  </script>
</head>
<body>
<center><h2>Post your comments</h2></center>
<div class="container" style="border:1px solid black;width:80%;height:300px;overflow:scroll">
post your comments from here....<br><br>
<div id="postComments">
</div>
</div>

<div class="container" style="border:1px solid black;width:80%;height:50%;">
  <div style="margin-top:10px">
    <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" id="name">
    </div>
    <div class="form-group">
      <label for="comment">Comment:</label>
      <textarea class="form-control" rows="5" id="comment"></textarea>
    </div>
    <div class="form-group">
      <label id="error" class="text-danger"></label>
    </div>
    <div class="form-group">
      <label id="target"></label>
    </div>
   <button onclick="submitForm()" class="btn btn-primary">Post</button>
   <br>
   <br>
  </div>
</div>

</body>
</html>
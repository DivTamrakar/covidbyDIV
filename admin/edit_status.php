<?php
include('header.php');

date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');



$id=($_GET['id']);
$vid=($_GET['vid']);

if(isset($_POST['btnchange']))
{

$status=mysqli_real_escape_string($conn,$_POST['cmdstatus']);

$type=mysqli_real_escape_string($conn,$_POST['cmdtype']);
$center=mysqli_real_escape_string($conn,$_POST['cmdsite']);
$dose=mysqli_real_escape_string($conn,$_POST['txtdose']);
	
	
	
	
	
	
$sql = " update users set status='$status' where ID='$id'";
  if (mysqli_query($conn, $sql)) {


    //save users details
    $query = "INSERT into `vaccination` (vaccinationID,vaccination_type,center,dose,vaccination_date)
    VALUES ('$vid','$type','$center','$dose','$current_date')";

    $result = mysqli_query($conn,$query);
    if($result){
    header("Location: user-record.php"); 
    }else{
      echo mysqli_error($conn);exit;
    }
  }
}
?>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6 b-r">
                              <h3 class="m-t-none m-b"> Update Covid-19 Status </h3>
                                <form role="form" method="POST">
                                    <div class="form-group"><strong>
<select name="cmdstatus" id="select" class="form-control" required="">
    <option value = "">Select</option>
    <option value = "Not Available">Not Available</option>
    <option value = "Negative">Negative</option>
    <option value = "Positive">Positive</option>

      </select>                                    
	   </div>
	        <div class="form-group"><strong>
<select name="cmdsite" id="select" class="form-control" required="">
                <option value = "">Select Vaccination Site</option>
                <option value="Jabalpur Hospital and Research Centre">Jabalpur Hospital and Research Centre</option>
				<option value="Marble City Hospital">Marble City Hospital</option>
				<option value="Bombay Hospital">Bombay Hospital</option>
				<option value="Ashis Hospital">Ashis Hospital</option>				
				<option value="Best Super Speciality Hospital">Best Super Speciality Hospital</option>
				<option value="Anant Multispeciality Hospital">Anant Multispeciality Hospital</option>
				<option value="Sarvoday Hospital ">Sarvoday Hospital</option>
				
      </select>                                    
	   </div>
	           <div class="form-group"><strong>
<select name="cmdtype" id="select" class="form-control" required="">
    <option value = "">Select Type</option>
    <option value = "Covaxin">Covaxin</option>
    <option value = "Covishield">Covishield</option>
 <option value = "BECOV2B">BECOV2B</option>
    <option value = "Ad26.COV2.S">BECOV2C</option>
        <option value = "BECOV2D">BECOV2D</option>

      </select>                                    
	   </div>
	     <div class="form-group"><strong>
              <input type="num" name="txtdose" placeholder="Enter No. of Dose" data-form-field="address" class="form-control" value="<?php if (isset($_POST['txtdose']))?><?php echo $_POST['txtdose']; ?>" id="name-form7-15">
                                 
	   </div>

									
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="btnchange"><strong>Update </strong></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6">
                                
                                <p class="text-center">&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-lg-5"></div>
            </div>
            <div class="row"></div>
        </div>
        <div class="footer">
            <div class="pull-right"></div>
            <div><?php  include('footer.php'); ?></div>
        </div>

        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
		<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Success</strong> 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Error</strong> 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>
</body>

</html>

<?php
$pageTitle = 'Adminstration';
include INCLUDES_ADMIN_PATH."/header.php";
include INCLUDES_ADMIN_PATH."/nav.php";
include INCLUDES_ADMIN_PATH."/sidebar.php";

?>


    <script>
        function validate(value) {
            $.ajax({
                url:`<?=URLROOT?>AdminController/IsValidPhone/${value}`,
                dataType:"json",
                cache:false,
                success:function (data, status) {
                    if (JSON.parse(data) === true){
                        if ($('#phone').hasClass('form-control is-invalid')){
                            $("#phone").removeClass("form-control is-invalid");
                        }else if($('#phone').hasClass('form-control is-valid')){
                            $("#phone").removeClass("form-control is-valid");
                        }
                        $("#phone").addClass("form-control is-valid");
                    }else {
                        if ($('#phone').hasClass('form-control is-valid')){
                            $("#phone").removeClass("form-control is-valid");
                        }else if($('#phone').hasClass('form-control is-invalid')){
                            $("#phone").removeClass("form-control is-invalid");
                        }
                        $("#phone").addClass("form-control is-invalid");
                    }
                }
            })
        }

        function out(){
            $("#phone").removeClass("form-control is-valid");
            $("#phone").removeClass("form-control is-invalid");
        }
    </script>



			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->


                    <?php
                    if (!empty($_SESSION['error'])){?>
                    <div class="col-md-8 offset-md-4">
                        <div class="row">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_SESSION['error'];
                                     unset($_SESSION['error']);
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php }?>

                    <?php
                    if (!empty($_SESSION['alert'])){?>
                        <div class="col-md-8 offset-md-4">
                            <div class="row">
                                <div class="alert alert-success" role="alert">
                                    <?php echo $_SESSION['alert'];
                                    unset($_SESSION['alert']);
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php }?>


                    <div class="col-md-8 offset-md-4">
                        <label>أدخل رقم هاتف المسؤول</label>
                        <div class="row">
                        <div class="col-md-6">
                                <form method="post" action="<?=URLROOT?>AdminController/SetAsAdministrator">
                                <input
                                    style="border: 2px solid transparent;
                                    height: 40px;
                                    border-radius: 4px; width: 450px "
                                    type="tel" name="phone" id="phone"
                                    oninput="validate(this.value)"
                                    onchange="validate(this.value)"
                                    onmouseover="validate(this.value)"
                                    onmouseout="out()"
                                    placeholder="من فضلك أدخل رقم المسؤول الذي تريد تعيينه" >
                            </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" name="submit" class="btn btn-success">تعيين كمسؤول</button>
                                </div>
                            </div>
                            </form>
                    </div>

                </div>
            </div>

<?php
include INCLUDES_ADMIN_PATH."/footer.php";
?>
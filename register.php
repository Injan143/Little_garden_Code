<?= $this->load->view("web/template/header.php") ?>
<div class="body-content login_container">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                
                <div class="col-md-6 col-sm-6 col-md-offset-3 ">
                   <div class="bg-white login_card ">
                    <h3 class="mt-5">Sign Up</h3>
                        <form class="register-form outer-top-xs" method="post">
                            <div class="form-group">
                                <label class="info-title">Email Address <span>*</span></label>
                                <input type="email" name="email" required="" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label class="info-title">Password <span>*</span></label>
                                <input type="password" name="password" required="" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
                            </div>
                            <div class="form-group">
                                <label class="info-title">Confirm Password <span>*</span></label>
                                <input type="password" name="c_password" required="" class="form-control unicase-form-control text-input" id="exampleInputPassword2" >
                            </div>
                            <div class="radio outer-xs">
                                <a href="<?= base_url() ?>index.php/admin/login" class="forgot-password">Admin Login!</a>
                                <a href="<?= base_url() ?>index.php/web/login/index" class="forgot-password pull-right">Already have account? Login!</a>
                            </div>
                            <div class="text-center">
                            <button type="submit" class="btn-upper btn theme-btn checkout-page-button">Sign Up</button>
                            </div>
                        </form>	
                   </div>				
                </div>
                
            </div>
        </div>

    </div>
</div>
<?= $this->load->view("web/template/footer") ?>
<script>
    $(document).on('submit', 'form', function (ev) {
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                if (data.data == 1)
                    window.location.reload();
                alert(data.message);
            }, error: function (jqXHR, textStatus, errorThrown) {
                data = jqXHR.responseText.split('   {');
                try {
                    data = JSON.parse("{" + data[1]);
                    show_toast(data.type, data.title, data.message);
                } catch (e) {
                    show_toast("error", "Internal Error", "Invalid Server Response")
                }
            }
        });
        ev.preventDefault();
    });

</script>
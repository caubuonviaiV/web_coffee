
<!DOCTYPE html>
<html lang="en" class="h-100">

<x-admin-header-css></x-admin-header-css>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="{{ asset('assets/images/logo-full.png') }}" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form  id="formSubmit">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control" value="hello@example.com" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" name="email" class="form-control" value="Password" required>
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <div class="mb-3">
                                               <div class="form-check custom-checkbox ms-1">
													<input type="checkbox" class="form-check-input" id="basic_checkbox_1" required>
													<label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
												</div>
                                            </div>
                                            <div class="mb-3">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        @csrf
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--***************Scripts*****************-->
    <x-admin-footer-js></x-admin-footer-js>
    <script>
        $("#formSubmit").submit(function(e) {
            e.preventDefault()
            if($(this).parsley().validate()) {
                var url = "{{ route('auth.post_login') }}";
                // $.ajax({
                //     url: url,
                //     data: $('#formSubmit').serialize(),
                //     type: 'post',
                //     success: function(result) {
                //         if (result.status == 200) {
                //             alert('Succesfully submit');
                //         } else {
                //             alert('Wrong Credentials');
                //         }
                //     }
                // });
            }
        });
    </script>
</body>
</html>

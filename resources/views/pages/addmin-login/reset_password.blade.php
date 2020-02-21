{{-- <h4>Thank you for using kids-now software. Click <a href="{{ $route }}"> here </a>to retrieve the password !</h4> --}}
{{-- 
<h2>Welcome {{ $first_name }} {{ $last_name }} to Kids-now </h2>
<h4>Your Password is : {{ $password }} </h4> --}}
<html>
	<head>
		<meta charset="utf-8">
		<title>@lang('kidsnow.title_email')</title>
		{{-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
   		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    	<link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    	<link rel="stylesheet" href="css/bootstrap.min.css">
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
	    <!-- Font Awesome -->
	    <link rel="stylesheet" href="css/font-awesome.min.css"> --}}
	</head>
<body>
<table style="width:660px;margin:0 auto" align="center">
	<tbody>
		<tr>
		    <td style="background:#f2f2f2;padding:12px">
		    	<table style="width:100%;clear:both;font-size:13px">
		        	<tbody>
				        <tr>
				          <td style="background-color:#5363d6;">
				            <table style="width:100%">
				            	<tbody>
					            	<tr>
					                	<td style="text-align:center;vertical-align:middle;padding:15px 25px 15px">
					                		<img src="http://kidsnow.edu.vn/images/logo-ngang.png" style="width: 60%;height: auto;" >
					                	</td>
					            	</tr>
				            	</tbody>
				            </table>
				          </td>
				        </tr>
			        </tbody>
			    </table>
		      <table width="100%; background:#ffffff" bgcolor="#ffffff">
		        <tbody><tr>
		          <td>
		            <table width="100%; background:#e3e3e3" bgcolor="#e3e3e3">
		              <tbody><tr>
		                <td style="padding:1px 1px 0">
		                  <table width="100%; background:#ffffff" bgcolor="#ffffff">
		                    <tbody><tr>
		                      <td>
		                        <table style="width:100%">
		                          <tbody><tr>
		                            <td style="padding:25px 25px 25px">
		                              <p style="text-align:justify;color:#010101;font-size:16px;line-height:22px;font-weight:700;margin:0 0 40px 0">@lang('kidsnow.Welcome_email_staff') <b>{{ $first_name }} {{ $last_name }}</b> !</p>
		                              <p style="text-align:justify;color:#010101;font-size:16px;line-height:22px">@lang('kidsnow.title_welcome_email_staff') </p>

		                              <p style="text-align:justify;color:#010101;font-size:16px;line-height:18px">Click <a href="{{ $route }}"> @lang('kidsnow.here_email_reset_password') </a>@lang('kidsnow.reset_password_email') !</p>
		                            
		                            </td>
		                          </tr>
		                          </tbody></table>
		                        <table style="width:100%;margin-bottom: 10px;">
		                          <tbody><tr>
		                            <td style="padding:0 25px">
		                              <table style="width:100%">
		                                <tbody>
		                                	<tr style="margin-bottom: 5px;">
		                                  <td>
		                                    {{-- <a href="" style="color:#fff;text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://facebook.com/khutro.vn&amp;source=gmail&amp;ust=1581741216315000&amp;usg=AFQjCNFaqlGount5b0aKdcYG6Y7gSCJVoA"><img src="https://ci5.googleusercontent.com/proxy/Or9XZ9vnsujNezkguXkaNYygZdx5NIWAeLBw8oC-YUxsw-BmAOO5ZOMhaJHAH6mQplWOv1bQKdQRgZpQ1ub25WqvyJMwoi74tYwb0CiNGDA-8eqXf6gXQPHiWw=s0-d-e1-ft#https://khutro.com/wp-content/uploads/2017/12/facebook-mail-template.png" style="display:inline-block" class="CToWUd"></a>&nbsp;&nbsp;
		                                    <a href="https://www.youtube.com/channel/UClyOPJw40fsIolVBtJWwjgQ" style="color:#fff;text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.youtube.com/channel/UClyOPJw40fsIolVBtJWwjgQ&amp;source=gmail&amp;ust=1581741216316000&amp;usg=AFQjCNHc5rcC-bgsEEGTSnqwnHejitKMyA"><img src="https://ci3.googleusercontent.com/proxy/8tfmXFrh0SHxjGrlNfSHJ29iBJuHQoQkDjnm7omX8-trpnABEpHwU-bTcxQrzP9_pyzrfrBOTpHe9wwA5qYzF2aTbfTAgj56JfwJzQHEetvTPMck4_MuJysp=s0-d-e1-ft#https://khutro.com/wp-content/uploads/2017/12/youtube-mail-template.png" style="display:inline-block;margin-right:6px" class="CToWUd"></a> --}}
		                                  </td>
		                                  <td>
                                            {{-- style="width:220px;background-color:#5363d6;height:35px;text-align:center;border-radius:2px 2px 0 0;" --}}
		                                    {{-- <a href="tel:0968031388" style="text-decoration:none;font-size:16px;font-weight:bold;color:#fff;padding:5px" target="_blank"><img src="https://ci5.googleusercontent.com/proxy/O7tID-vvaQdX_KwjoRKJpdTwiJfnnnm_qY-QQnI42am0GVIAk-rujyHmv86tYlNwkzugXnkryjCv7KIBPCoU1TJ4un5oiKlnldI6vPbNmpZwsZ1d7ct4riC13qmLqQ=s0-d-e1-ft#https://khutro.com/wp-content/uploads/2017/12/phone-white-mail-template.png" alt="" class="CToWUd">&nbsp;Tổng đài: 096.803.1388</a> --}}
		                                  </td>
		                                </tr>
		                                </tbody></table>
		                            </td>
		                          </tr>
		                          </tbody></table>
		                      </td>
		                    </tr>
		                    </tbody></table>
		                </td>
		              </tr>
		              </tbody></table>
		          </td>
		        </tr>
		        </tbody></table>
		      <table style="width:100%;clear:both;font-size:13px">
		        <tbody>
		        <tr>
		          <td style="background-color:#5363d6;">
		            <table style="width:100%">
		              <tbody>
		              <tr>
		                <td style="text-align:center;vertical-align:middle;padding:15px 25px 15px"><a href="http://kidsnow.edu.vn" style="font-size:14px;text-decoration:none;color:#fff;font-weight:bold;vertical-align:text-top" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.khutro.com&amp;source=gmail&amp;ust=1581741216316000&amp;usg=AFQjCNFmeP66p-Huv_KIYnExYXALGjidaw">kidsnow.edu.vn</a></td>
		              </tr>
		              </tbody>
		            </table>
		          </td>
		        </tr>
		        </tbody>
		      </table>
		    </td>
		</tr>
	</tbody>
</table>
</body>
</html>
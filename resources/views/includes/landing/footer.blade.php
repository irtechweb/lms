@php
    $setting = \App\Models\Setting::first();
@endphp
<footer style="margin-top: 15px;width: 100%;position: absolute;margin-bottom: 0px;">
    <div class="container">
        <div class="footer">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="{{ Auth::check() ? '/home' : '/' }}"><img src="{{url('logo/Speak_2_Impact_Logo_Black_Bg_white.png')}}" height="80px" class="css-class cursor-pointer" alt="alt text"></a>
                    </div>
                </div>
                <div class="col-md-6 offset-sm-1">
                    <h3 style="color:#FFFFC8; text-align: center;">©️ {{env('APP_NAME')}} <?= date('Y');?></h3>
                    <div class="footer-link">
                        <a href="{{url('cookiepolicy')}}" class="px-4">Cookie Policy</a>
                        <a href="{{url('privacypolicy')}}" class="px-4">Privacy Policy</a>
                        <a href="{{url('termofservice')}}" class="px-4">Terms of Service</a>
                    </div>
                </div>
                <div class="col-md-2 offset-sm-1">
                    <div class="footer-links">
                        <a href="javascript:;">Contact us</a>
                        <a href="javascript:;"><?=isset($setting->contact_email)?$setting->contact_email:"info@speak2impact.com"?></a>
                    </div>
                    <div class="social-icon">
                        <a href="<?=isset($setting->instagram)?$setting->instagram:'https://www.instagram.com/speak2impact/' ?>" target="_blank"><img src="{{url('images/')}}/instagram.svg" width="28px" height="28px" alt=""></a>
                        <a href="<?=isset($setting->tiktok)?$setting->tiktok:'https://www.tiktok.com/@smashfield89' ?>" target="_blank"><img src="{{url('images/')}}/Vector.svg" width="28px" height="28px" alt=""></a>
                        <a href="<?=isset($setting->facebook)?$setting->facebook:'https://www.linkedin.com/in/susannahashfield/' ?>" target="_blank"><img src="{{url('images/')}}/linkedin.svg" width="30px" height="30px" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
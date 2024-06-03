<?php
    use App\Models\Setting;
    $setting = Setting::find('1');
?>
@foreach($post as $val)
<div class="col-lg-4 col-md-4 col-6 ">
    @include('pages.iteam.product')
</div>
@endforeach
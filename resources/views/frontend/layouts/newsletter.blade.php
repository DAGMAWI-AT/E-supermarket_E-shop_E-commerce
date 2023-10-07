
<!-- Start Shop Newsletter  -->
<section class="shop-newsletter section">
    <div class="container">
        <div class="inner-top">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <!-- Start Newsletter Inner -->
                    <div class="inner">
                        <h4>{{ GoogleTranslate::trans('Newsletter',app()->getLocale()) }}</h4>
                        <p>{{ GoogleTranslate::trans('Subscribe to our newsletter and get',app()->getLocale()) }}  <span>10%</span> {{ GoogleTranslate::trans('off your first purchase',app()->getLocale()) }}</p>
                        <form action="{{route('subscribe')}}" method="post" class="newsletter-inner">
                            @csrf
                            <input name="email" placeholder="Your email address" required="" type="email">
                            <button class="btn" type="submit">{{ GoogleTranslate::trans('Newsletter',app()->getLocale()) }}</button>
                        </form>
                    </div>
                    <!-- End Newsletter Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop Newsletter -->
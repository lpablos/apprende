@extends('application.layout.default')

@section('content')
    <!-- .block-finder -->
    <div class="block-finder block-finder--layout--full block">
        <form>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="block-finder__body" style="background-image: url('{{ asset('images/finder/finder.') }}jpg');">
                            <div class="block-finder__header">
                                <div class="block-finder__title">Find Parts For Your Vehicle</div>
                                <div class="block-finder__subtitle">Over hundreds of brands and tens of thousands of parts</div>
                            </div>
                            <div class="block-finder__form">
                                <div class="block-finder__form-item">
                                    <select class="block-finder__select">
                                        <option value="none">Select Year</option>
                                        <option>2010</option>
                                        <option>2011</option>
                                        <option>2012</option>
                                        <option>2013</option>
                                        <option>2014</option>
                                        <option>2015</option>
                                        <option>2016</option>
                                        <option>2017</option>
                                        <option>2018</option>
                                        <option>2019</option>
                                        <option>2020</option>
                                    </select>
                                </div>
                                <div class="block-finder__form-item">
                                    <select class="block-finder__select" disabled>
                                        <option value="none">Select Make</option>
                                        <option>Audi</option>
                                        <option>BMW</option>
                                        <option>Ferrari</option>
                                        <option>Ford</option>
                                        <option>KIA</option>
                                        <option>Nissan</option>
                                        <option>Tesla</option>
                                        <option>Toyota</option>
                                    </select>
                                </div>
                                <div class="block-finder__form-item">
                                    <select class="block-finder__select" disabled>
                                        <option value="none">Select Model</option>
                                        <option>Explorer</option>
                                        <option>Focus S</option>
                                        <option>Fusion SE</option>
                                        <option>Mustang</option>
                                    </select>
                                </div>
                                <div class="block-finder__form-item">
                                    <select class="block-finder__select" disabled>
                                        <option value="none">Select Engine</option>
                                        <option>Gas 1.6L 125 hp AT/L4</option>
                                        <option>Diesel 2.5L 200 hp AT/L5</option>
                                        <option>Diesel 3.0L 250 hp MT/L5</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="block-finder__button btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- .block-finder / end -->
    <!-- .block-features -->
    <div class="block block-features block-features--layout--boxed">
        <div class="container">
            <div class="block-features__list">
                <div class="block-features__item">
                    <div class="block-features__icon">
                        <svg width="48px" height="48px">
                            <use xlink:href="{{ asset('images/sprite.svg#fi-free-delivery-48') }}"></use>
                        </svg>
                    </div>
                    <div class="block-features__content">
                        <div class="block-features__title">Free Shipping</div>
                        <div class="block-features__subtitle">For orders from $50</div>
                    </div>
                </div>
                <div class="block-features__divider"></div>
                <div class="block-features__item">
                    <div class="block-features__icon">
                        <svg width="48px" height="48px">
                            <use xlink:href="{{ asset('images/sprite.svg#fi-24-hours-48') }}"></use>
                        </svg>
                    </div>
                    <div class="block-features__content">
                        <div class="block-features__title">Support 24/7</div>
                        <div class="block-features__subtitle">Call us anytime</div>
                    </div>
                </div>
                <div class="block-features__divider"></div>
                <div class="block-features__item">
                    <div class="block-features__icon">
                        <svg width="48px" height="48px">
                            <use xlink:href="{{ asset('images/sprite.svg#fi-payment-security-48') }}"></use>
                        </svg>
                    </div>
                    <div class="block-features__content">
                        <div class="block-features__title">100% Safety</div>
                        <div class="block-features__subtitle">Only secure payments</div>
                    </div>
                </div>
                <div class="block-features__divider"></div>
                <div class="block-features__item">
                    <div class="block-features__icon">
                        <svg width="48px" height="48px">
                            <use xlink:href="{{ asset('images/sprite.svg#fi-tag-48') }}"></use>
                        </svg>
                    </div>
                    <div class="block-features__content">
                        <div class="block-features__title">Hot Offers</div>
                        <div class="block-features__subtitle">Discounts up to 90%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>          
    <!-- .block-features / end -->
    
@stop
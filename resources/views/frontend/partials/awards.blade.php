<!-- Award Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3 heading-after">Awards Thats We Achieve</h1>

        </div>
        <div class="award-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">
            @forelse ($awards as $award)
                <div class="rounded p-1">
                    <div class="d-flex align-items-center justify-content-center p-2">
                        <img class="img-fluid flex-shrink-0 rounded" src="{{ asset($award?->image) }}">

                    </div>
                </div>
            @empty
                No Data Found
            @endforelse

        </div>
    </div>
</div>
<!-- Award End -->

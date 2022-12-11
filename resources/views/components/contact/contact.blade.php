<div class="row justify-content-center">
    @forelse ($contacts as $contact)
        <div class="col-lg-6 col-md-6 col-sm-6 col-12  pt-2 wow fadeInUp address-info" data-wow-delay="0.1s">
            <div class="phone-contact bg-white p-4 my-2">
                <h5>{{ $contact->contact_of }}</h5>
                <p class="mt-3"><i class="fa fa-address-card address-icon"></i><span>:</span><span
                        class="text">{{ $contact->address }}</span>
                </p>
                <p class="mt-3"><i class="fa fa-envelope address-icon"></i><span>:</span><span
                        class="text">{{ $contact->email }}</span>
                </p>
                <p class="mt-3"><i class="fa fa-phone address-icon"></i><span>:</span><span
                        class="text">{{ $contact->phone_number }}</span>
                </p>
            </div>
        </div>
    @empty
        No Contact Number Available
    @endforelse

</div>

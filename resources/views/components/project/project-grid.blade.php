<div class="col-lg-3 col-md-4 col-md-6 wow fadeInUp mix grid-{{ $project->category->name }}" data-wow-delay="0.1s">
    <div class="property-item rounded overflow-hidden">
        <div class="position-relative  overflow-hidden">
            <a href="{{ route('frontend.project.show', $project->id) }}"><img class="img-fluid"
                    src="{{ asset($project->banner) }}" alt=""></a>
            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                {{ $project->phase->name }}</div>
        </div>
        <div class="p-4 pb-0">
            <a class="d-block h5 mb-2" href="{{ route('frontend.project.show', $project->id) }}">
                {{ $project->title }}</a>
            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $project->address }}</p>
        </div>
        <div class="d-flex border-top">
            <small class="flex-fill text-center border-end py-2"></i>{{ $project->type->name }}</small>
            <small class="flex-fill text-center py-2">{{ $project->building_size }}</small>
        </div>
    </div>
</div>

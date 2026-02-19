@extends('admin.layouts.app')

@section('content')
<!--begin::Toolbar -->
<x-toolbar :title="'Dashbaord'" :breadcrumbs="[['label' => 'Home', 'url' => route('admin.dashboard')], ['label' => 'Dashbaord', 'active' => true]]" />
<!--end::Toolbar -->

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <div class="row g-5 g-xl-8">
            <div class="col-xl-4">
                <a href="/admin/partners" class="card bg-success hoverable card-xl-stretch mb-xl-8">
                    <div class="card-body">
                        <i class="bi bi-people fs-1 text-white"></i>
                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">Total Partners</div>
                        <div class="fw-bold text-white">{{ $partnerCount ?? 0 }}</div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4">
                <a href="/admin/sliders" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                    <div class="card-body">
                        <i class="bi bi-images fs-1 text-white"></i>
                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">Total Sliders</div>
                        <div class="fw-bold text-white">{{ $slidersCount ?? 0 }}</div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4">
                <a href="/admin/portfolios" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                    <div class="card-body">
                        <i class="bi bi-briefcase fs-1 text-white"></i>
                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">Total Portfolios</div>
                        <div class="fw-bold text-white">{{ $portfolioCount ?? 0 }}</div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row g-5 g-xl-8">

            <div class="col-xl-4">
                <a href="/admin/projects" class="card bg-secondary hoverable card-xl-stretch mb-xl-8">
                    <div class="card-body">
                        <i class="bi bi-kanban fs-1 text-black"></i>
                        <div class="text-black fw-bolder fs-2 mb-2 mt-5">Total Projects</div>
                        <div class="fw-bold text-black">{{ $projectCount ?? 0 }}</div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4">
                <a href="/admin/videos" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                    <div class="card-body">
                        <i class="bi bi-camera-video fs-1 text-white"></i>
                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">Total Videos</div>
                        <div class="fw-bold text-white">{{ $videoCount ?? 0 }}</div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4">
                <a href="/admin/service-categories" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                    <div class="card-body">
                        <i class="bi bi-layers fs-1 text-white"></i>
                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">Total Service Categories</div>
                        <div class="fw-bold text-white">{{ $serviceCategoryCount ?? 0 }}</div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row g-5 g-xl-8">
            <div class="col-xl-4">
                <a href="/admin/services" class="card bg-info hoverable card-xl-stretch mb-xl-8">
                    <div class="card-body">
                        <i class="bi bi-tools fs-1 text-white"></i>
                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">Total Services</div>
                        <div class="fw-bold text-white">{{ $serviceCount ?? 0 }}</div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4">
                <a href="/admin/tags" class="card bg-success hoverable card-xl-stretch mb-xl-8">
                    <div class="card-body">
                        <i class="bi bi-tags fs-1 text-white"></i>
                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">Total Tags</div>
                        <div class="fw-bold text-white">{{ $tagCount ?? 0 }}</div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4">
                <a href="/admin/blogs" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                    <div class="card-body">
                        <i class="bi bi-journal-text fs-1 text-white"></i>
                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">Total Blogs</div>
                        <div class="fw-bold text-white">{{ $blogCount ?? 0 }}</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
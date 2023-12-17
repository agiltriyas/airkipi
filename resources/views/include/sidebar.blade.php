<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <li class="label">Main</li>
                <li class="{{(Request::segment(2) == 'home') ? 'active' : ''}}"><a href="{{route('admin.home')}}"><i class="ti-home"></i> Dashboard </a></li>
                <li class="label">Management</li>
                <li class="{{(Request::segment(2) == 'activities') ? 'active' : ''}}"><a href="{{route('admin.activities.index')}}"><i class="ti-pencil-alt"></i> Activities </a></li>
                <li class="{{(Request::segment(2) == 'section') ? 'active' : ''}}"><a href="{{route('admin.section.index')}}"><i class="ti-view-list-alt"></i> Section </a></li>

                <li class="label">Content</li>
                @foreach(General::section() as $section)
                <li class="{{(Request::segment(4) == $section->name) ? 'active' : ''}}"><a href="{{route('admin.section-content.content',$section->name)}}"><i class="ti-view-list-alt"></i> {{ucfirst($section->name)}} </a></li>
                @endforeach
                <!-- 
                <li class="label">Data</li>
                <li class="{{(Request::segment(2) == 'user') ? 'active' : ''}}"><a href="{{route('admin.user.index')}}"><i class="ti-user"></i> User Management </a></li> -->
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->
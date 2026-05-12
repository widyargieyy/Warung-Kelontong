<ul class="side-nav">
    {{-- ==================== MAIN ==================== --}}
    <li class="side-nav-title mt-2" data-lang="main">Main</li>

    {{-- Dashboards --}}
    <li class="side-nav-item">
        {{-- Chat --}}
        <a href="" class="side-nav-link ">
            <span class="menu-icon"><i class="ti ti-dashboard"></i></span>
            <span class="menu-text" data-lang="apps-chat">Dashboard</span>
        </a>
    </li>

    {{-- ==================== APPS ==================== --}}
    <li class="side-nav-title mt-2" data-lang="apps">Apps</li>

    {{-- Projects --}}
    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#projects" aria-expanded="false" aria-controls="projects"
            class="side-nav-link">
            <span class="menu-icon"><i class="ti ti-briefcase"></i></span>
            <span class="menu-text" data-lang="projects">Projects</span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="projects">
            <ul class="sub-menu">
                <li class="side-nav-item">
                    <a href="as" class="side-nav-link">
                        <span class="menu-text" data-lang="apps-projects-grid">My Projects</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
</ul>

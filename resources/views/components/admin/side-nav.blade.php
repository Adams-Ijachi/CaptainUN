        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    
                    <li>
                    
                        <a  href="{{ route('admin.home') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Home</span>
                        </a>
                      
                    </li>

                    @if(Auth::user()->user_type == '0')
                    <li class="mega-menu mega-menu-sm">
                        <a  href="{{ route('admin.climateBackstop') }}" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Climate BackStops</span>
                        </a>
                       
                    </li>
                    @endif
                 
                    <li>
                    
                        <a  href="{{ route('admin.cap') }}" aria-expanded="false">
                            <i class="icon-grid menu-icon"></i> <span class="nav-text">Country/Companies</span>
                        </a>
                    </li>
                    <li>
                    
                        <a  href="{{ route('admin.comments') }}" aria-expanded="false">
                            <i class="icon-envelope menu-icon"></i><span class="nav-text">COMMENTS</span>
                        </a>
                    </li>
                    <li>
                    
                        <a  href="{{ route('admin.volunteers') }}" aria-expanded="false">
                            <i class="icon-people menu-icon"></i> <span class="nav-text">VOLUNTEERS</span>
                        </a>
                  
                    </li>
                    <li>
                        <a  href="{{ route('admin.logout') }}" aria-expanded="false">
                            <i class="icon-key menu-icon"></i> <span class="nav-text">LOGOUT</span>
                        </a>
                  
                    </li>
                 
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
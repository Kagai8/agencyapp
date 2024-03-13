

  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ route('admin.dashboard')}}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="" alt="">
						  <h3><b>GreenLine</b> Insurance Agencies</h3>
              
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
      		<li class="">
                <a href="{{ route('admin.dashboard')}}">
                  <i data-feather="pie-chart"></i>
      			<span>Dashboard</span>
                </a>
            </li>  
             @if(auth()->check()&& auth()->user()->role->name === 'Minister'  )
        <li class="header nav-small-cap">SETTINGS </li>
        <li class="treeview ">
          <a href="#">
            <i data-feather="mail"></i> <span>App Settings </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class=""><a href="{{ route('suspension')}}"><i class="ti-more"></i>Suspend App</a></li>
              
          </ul>
        </li>
        <li class="header nav-small-cap">Log out </li>
        <li class="treeview ">
          
          
              <form method="POST" action="{{ route('logout') }}">
                    @csrf
<a ><i class="ti-more">
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
              </i></a>
          </li>
              
         
        
        @endif
          @if(auth()->check()&& auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Chairman' || auth()->user()->role->name === 'Manager')
          <li class="header nav-small-cap">EMPLOYEE SECTION </li>
          <li class="treeview">
            <a href="">
              <i data-feather="message-circle"></i>
              <span>Employees</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class=""><a href="{{ route('employee.add')}}"><i class="ti-more"></i>Add Employee</a></li>
              <li class=""><a href="{{ route('manage-employee')}}"><i class="ti-more"></i>Manage Employees</a></li>
              
            </ul>
          </li> 
        <li class="treeview ">
          <a href="#">
            <i data-feather="mail"></i> <span>Payroll System </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class=""><a href="{{ route('generate-payroll')}}"><i class="ti-more"></i>Generate PaySlip</a></li>
              
          </ul>
        </li>
        @endif
        @if(auth()->check()&& auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Chairman' || auth()->user()->role->name === 'Manager' || auth()->user()->role->name === 'User' )
        <li class="header nav-small-cap">CLIENT SECTION </li>
        <li class="treeview ">
          <a href="#">
            <i data-feather="mail"></i> <span>Customer Hub </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class=""><a href="{{ route('create-customer-account')}}"><i class="ti-more"></i>Create Account</a></li>
              <li class=""><a href="{{ route('manage-customer-account')}}"><i class="ti-more"></i>Manage Accounts</a></li>
          </ul>
        </li>
        <li class="header nav-small-cap">FINANCE SECTION </li>
        <li class="treeview ">
          <a href="#">
            <i data-feather="mail"></i> <span>Financing </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class=""><a href="{{ route('create-onetime-purchase')}}"><i class="ti-more"></i>One Off Purchase</a></li>
              <li class=""><a href="{{ route('view-onetime-purchases')}}"><i class="ti-more"></i>Check One Off Purchases</a></li>
              <li class=""><a href="{{ route('create-payment-plan')}}"><i class="ti-more"></i>Create Payment Plan</a></li>
              <li class=""><a href="{{ route('view-payment-plans')}}"><i class="ti-more"></i>View Payment Plans</a></li>
              <li class=""><a href="{{ route('view-installments')}}"><i class="ti-more"></i>View Installments</a></li>
              
          </ul>
        </li>
        
        <li class="header nav-small-cap">COMMISSION </li>
        <li class="treeview ">
          <a href="#">
            <i data-feather="mail"></i> <span>Commission Hub </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class=""><a href="{{ route('commission-check')}}"><i class="ti-more"></i>Commission Check</a></li>
              
          </ul>
        </li>
        <li class="header nav-small-cap">REPORTS</li>
        <li class="treeview ">
          <a href="#">
            <i data-feather="mail"></i> <span>Reports </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class=""><a href="{{ route('report-employee')}}"><i class="ti-more"></i>Employee Report</a></li>
              <li class=""><a href="{{ route('report-paymentplan')}}"><i class="ti-more"></i>Payment Plans Report</a></li>
              <li class=""><a href="{{ route('report-onetime')}}"><i class="ti-more"></i>One Off Report</a></li>
              <li class=""><a href="{{ route('report-commission-onetime')}}"><i class="ti-more"></i>Commission(OFP)Report</a></li>
              <li class=""><a href="{{ route('report-commission-pp')}}"><i class="ti-more"></i>Commission(PP) Report</a></li>
              <li class=""><a href="{{ route('report-installments')}}"><i class="ti-more"></i>All Installments Report</a></li>
              
              
          </ul>
        </li>
        @endif
        @if(auth()->check()&& auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Chairman' || auth()->user()->role->name === 'Manager' || auth()->user()->role->name === 'Minister')
        <li class="header nav-small-cap">USERS </li>
        <li class="treeview ">
          <a href="#">
            <i data-feather="mail"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class=""><a href="{{ route('create-user')}}"><i class="ti-more"></i>Create Users</a></li>
              <li class=""><a href="{{ route('view-user')}}"><i class="ti-more"></i>Manage Users</a></li>
             
              
          </ul>
        </li>
        <li class="header nav-small-cap">SUPPORT </li>
        <li class="treeview ">
          <a href="#">
            <i data-feather="mail"></i> <span>Support</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class=""><a href="{{ route('support.details')}}"><i class="ti-more"></i>Support Contact</a></li>
              
             
              
          </ul>
        </li>
        @endif


       
   
		 
        

        
		    
        
        


 

		    

		 

    
       


        

      </ul>
    </section>
	
	
  </aside>
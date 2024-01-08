

  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ route('admin.dashboard')}}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="" alt="">
						  <h3><b>Agency</b> ManagerApp</h3>
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
          @if(auth()->check()&& auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Chairman' || auth()->user()->role->name === 'Manager')
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

        <li class="treeview ">
          <a href="#">
            <i data-feather="mail"></i> <span>Customer Hub </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class=""><a href="{{ route('create-customer-account')}}"><i class="ti-more"></i>Create Account</a></li>
              <li class=""><a href="{{ route('manage-customer-account')}}"><i class="ti-more"></i>Manage Account</a></li>
          </ul>
        </li>

        <li class="treeview ">
          <a href="#">
            <i data-feather="mail"></i> <span>Premium Financing </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class=""><a href="{{ route('create-onetime-purchase')}}"><i class="ti-more"></i>One Time Purchase</a></li>
              <li class=""><a href="{{ route('view-onetime-purchases')}}"><i class="ti-more"></i>Check One Time Purchases</a></li>
              <li class=""><a href="{{ route('create-payment-plan')}}"><i class="ti-more"></i>Create Payment Plan</a></li>
              <li class=""><a href="{{ route('view-payment-plans')}}"><i class="ti-more"></i>View Payment Plans</a></li>
          </ul>
        </li>
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
        @if(auth()->check()&& auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Chairman' || auth()->user()->role->name === 'Manager')
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
        @endif


       
   
		 
        

        
		    
        
        


 

		    

		 

    
       


        

      </ul>
    </section>
	
	
  </aside>
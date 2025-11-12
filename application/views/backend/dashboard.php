<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>&nbsp Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-primary"><i class="ti-user"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0">
                                    <?php 
                                        $this->db->where('status','ACTIVE');
                                        $this->db->from("employee");
                                        $active_employees = $this->db->count_all_results();
                                        echo $active_employees;
                                    ?>  Employees</h3>
                                        <a href="<?php echo base_url(); ?>employee/Employees" class="text-muted m-b-0">View Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-info"><i class="ti-file"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0">
                                             <?php 
                                                    $this->db->where('leave_status','Approve');
                                                    $this->db->from("emp_leave");
                                                    $approved_leaves = $this->db->count_all_results();
                                                    echo $approved_leaves;
                                                ?> Leaves
                                        </h3>
                                        <a href="<?php echo base_url(); ?>leave/Application" class="text-muted m-b-0">View Details</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-danger"><i class="ti-calendar"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0"> 
                                         <?php 
                                                $this->db->where('pro_status','running');
                                                $this->db->from("project");
                                                $running_projects = $this->db->count_all_results();
                                                echo $running_projects;
                                            ?> Projects
                                        </h3>
                                        <a href="<?php echo base_url(); ?>Projects/All_Projects" class="text-muted m-b-0">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-success"><i class="ti-money"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0">
                                         <?php 
                                                $this->db->where('status','Granted');
                                                $this->db->from("loan");
                                                $granted_loans = $this->db->count_all_results();
                                                echo $granted_loans;
                                            ?> Loan 
                                        </h3>
                                        <a href="<?php echo base_url(); ?>Loan/View" class="text-muted m-b-0">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="row">
                    <!-- Employee Status Chart -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Employee Status</h4>
                                <div style="height: 300px; position: relative;">
                                    <canvas id="employeeChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Leave Status Chart -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Leave Applications</h4>
                                <div style="height: 300px; position: relative;">
                                    <canvas id="leaveChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Project Status Chart -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Project Status</h4>
                                <div style="height: 300px; position: relative;">
                                    <canvas id="projectChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Monthly Overview Chart -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Monthly Overview</h4>
                                <div style="height: 350px; position: relative;">
                                    <canvas id="monthlyChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row -->
                <div class="row ">
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse card-info">
                            <div class="box bg-primary text-center">
                                <h1 class="font-light text-white">
                                    <?php 
                                        $this->db->where('status','INACTIVE');
                                        $this->db->from("employee");
                                        $inactive_employees = $this->db->count_all_results();
                                        echo $inactive_employees;
                                    ?>
                                </h1>
                                <h6 class="text-white">Former Employees</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-info card-inverse">
                            <div class="box text-center">
                                <h1 class="font-light text-white">
                                             <?php 
                                                    $this->db->where('leave_status','Not Approve');
                                                    $this->db->from("emp_leave");
                                                    $pending_leaves = $this->db->count_all_results();
                                                    echo $pending_leaves;
                                                ?> 
                                </h1>
                                <h6 class="text-white">Pending Leave Application</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse card-danger">
                            <div class="box text-center">
                                <h1 class="font-light text-white">
                                     <?php 
                                            $this->db->where('pro_status','upcoming');
                                            $this->db->from("project");
                                            $upcoming_projects = $this->db->count_all_results();
                                            echo $upcoming_projects;
                                        ?> 
                                </h1>
                                <h6 class="text-white">Upcoming Project</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse card-success">
                            <div class="box text-center">
                                <h1 class="font-light text-white">
                                         <?php 
                                                $this->db->where('status','Pending');
                                                $this->db->from("loan");
                                                $pending_loans = $this->db->count_all_results();
                                                echo $pending_loans;
                                            ?> 
                                </h1>
                                <h6 class="text-white">Pending Loan Application</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

            <div class="container-fluid">
                <?php 
                $notice = $this->notice_model->GetNoticelimit(); 
                $running = $this->dashboard_model->GetRunningProject(); 
                $userid = $this->session->userdata('user_login_id');
                $todolist = $this->dashboard_model->GettodoInfo($userid);                 
                $holiday = $this->dashboard_model->GetHolidayInfo();                 
                ?>
                <!-- Row -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Running Project/s</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" style="height:600px;overflow-y:scroll">
                                    <table class="table table-bordered table-hover earning-box">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($running AS $value): ?>
                                            <tr style="vertical-align:top;">
                                                <td><a href="<?php echo base_url(); ?>Projects/view?P=<?php echo base64_encode($value->id); ?>"><?php echo substr("$value->pro_name",0,25).'...'; ?></a></td>
                                                <td><?php echo $value->pro_start_date; ?></td>
                                                <td><?php echo $value->pro_end_date; ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">To Do list</h4>
                                <h6 class="card-subtitle">List of your next task to complete</h6>
                                <div class="to-do-widget m-t-20" style="height:550px;overflow-y:scroll">
                                            <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">
                                               <?php foreach($todolist as $value): ?>
                                                <li class="list-group-item" data-role="task">
                                                   <?php if($value->value == '1'){ ?>
                                                    <div class="checkbox checkbox-info">
                                                        <input class="to-do" data-id="<?php echo $value->id?>" data-value="0" type="checkbox" id="<?php echo $value->id?>" >
                                                        <label for="<?php echo $value->id?>"><span><?php echo $value->to_dodata; ?></span></label>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div class="checkbox checkbox-info">
                                                        <input class="to-do" data-id="<?php echo $value->id?>" data-value="1" type="checkbox" id="<?php echo $value->id?>" checked>
                                                        <label class="task-done" for="<?php echo $value->id?>"><span><?php echo $value->to_dodata; ?></span></label>
                                                    </div> 
                                                    <?php } ?>                                                   
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>                                    
                                </div>
                                <div class="new-todo">
                                   <form method="post" action="add_todo" enctype="multipart/form-data" id="add_todo" >
                                    <div class="input-group">
                                        <input type="text" name="todo_data" class="form-control" style="border: 1px solid #fff !IMPORTANT;" placeholder="Enter New Task...">
                                        <span class="input-group-btn">
                                        <input type="hidden" name="userid" value="<?php echo $this->session->userdata('user_login_id'); ?>">
                                        <button type="submit" class="btn btn-success todo-submit"><i class="fa fa-plus"></i></button>
                                        </span> 
                                    </div>
                                    </form>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Notice Board</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive slimScrollDiv" style="height:600px;overflow-y:scroll">
                                    <table class="table table-hover table-bordered earning-box ">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>File</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($notice AS $value): ?>
                                            <tr class="scrollbar" style="vertical-align:top">
                                                <td><?php echo $value->title ?></td>
                                                <td><mark><a href="<?php echo base_url(); ?>assets/images/notice/<?php echo $value->file_url ?>" target="_blank"><?php echo $value->file_url ?></a></mark>
                                                </td>
                                                <td style="width:100px"><?php echo $value->date ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Holidays</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" style="height:600px;overflow-y:scroll">
                                    <table class="table table-hover table-bordered earning-box">
                                       <thead>
                                            <tr>
                                                <th>Holiday Name</th>
                                                <th>Date</th>
                                            </tr>                                           
                                       </thead>
                                       <tbody>
                                          <?php foreach($holiday as $value): ?>
                                           <tr style="background-color:#e3f0f7">
                                               <td><?php echo $value->holiday_name ?></td>
                                               <td><?php echo $value->from_date; ?></td>
                                           </tr>
                                           <?php endforeach ?>
                                       </tbody> 
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

<!-- Chart.js CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

<script>
// Enhanced Chart.js Configuration with Modern Styling

// Chart defaults for all charts
Chart.defaults.font.family = "'Poppins', 'Segoe UI', 'Roboto', sans-serif";
Chart.defaults.color = '#6c757d';

// Custom gradient function
function createGradient(ctx, color1, color2) {
    const gradient = ctx.createLinearGradient(0, 0, 0, 300);
    gradient.addColorStop(0, color1);
    gradient.addColorStop(1, color2);
    return gradient;
}

// Employee Status Doughnut Chart with Enhanced Styling
const employeeCtx = document.getElementById('employeeChart').getContext('2d');
const employeeChart = new Chart(employeeCtx, {
    type: 'doughnut',
    data: {
        labels: ['Active Employees', 'Inactive Employees'],
        datasets: [{
            data: [<?php echo $active_employees; ?>, <?php echo $inactive_employees; ?>],
            backgroundColor: [
                createGradient(employeeCtx, '#1976d2', '#1565c0'),
                createGradient(employeeCtx, '#9e9e9e', '#757575')
            ],
            borderWidth: 4,
            borderColor: '#fff',
            hoverBorderWidth: 6,
            hoverBorderColor: '#fff',
            hoverOffset: 15
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '70%',
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    padding: 20,
                    font: {
                        size: 12,
                        weight: '500'
                    },
                    usePointStyle: true,
                    pointStyle: 'circle'
                }
            },
            tooltip: {
                backgroundColor: 'rgba(0,0,0,0.8)',
                padding: 12,
                borderColor: '#fff',
                borderWidth: 1,
                titleFont: {
                    size: 14,
                    weight: 'bold'
                },
                bodyFont: {
                    size: 13
                },
                displayColors: true,
                callbacks: {
                    label: function(context) {
                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                        const percentage = ((context.parsed / total) * 100).toFixed(1);
                        return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                    }
                }
            }
        },
        animation: {
            animateRotate: true,
            animateScale: true,
            duration: 1500,
            easing: 'easeInOutQuart'
        }
    },
    plugins: [{
        id: 'centerText',
        beforeDraw: function(chart) {
            const width = chart.width;
            const height = chart.height;
            const ctx = chart.ctx;
            ctx.restore();
            
            const total = chart.config.data.datasets[0].data.reduce((a, b) => a + b, 0);
            const fontSize = (height / 160).toFixed(2);
            ctx.font = "bold " + fontSize + "em Poppins";
            ctx.textBaseline = "middle";
            ctx.fillStyle = "#1976d2";
            
            const text = total.toString();
            const textX = Math.round((width - ctx.measureText(text).width) / 2);
            const textY = height / 2 - 10;
            
            ctx.fillText(text, textX, textY);
            
            ctx.font = (fontSize * 0.4) + "em Poppins";
            ctx.fillStyle = "#6c757d";
            const subText = "Total";
            const subTextX = Math.round((width - ctx.measureText(subText).width) / 2);
            ctx.fillText(subText, subTextX, textY + 25);
            
            ctx.save();
        }
    }]
});

// Leave Status Pie Chart with Enhanced Styling
const leaveCtx = document.getElementById('leaveChart').getContext('2d');
const leaveChart = new Chart(leaveCtx, {
    type: 'pie',
    data: {
        labels: ['Approved Leaves', 'Pending Leaves'],
        datasets: [{
            data: [<?php echo $approved_leaves; ?>, <?php echo $pending_leaves; ?>],
            backgroundColor: [
                createGradient(leaveCtx, '#17a2b8', '#138496'),
                createGradient(leaveCtx, '#ffc107', '#e0a800')
            ],
            borderWidth: 4,
            borderColor: '#fff',
            hoverBorderWidth: 6,
            hoverBorderColor: '#fff',
            hoverOffset: 15
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    padding: 20,
                    font: {
                        size: 12,
                        weight: '500'
                    },
                    usePointStyle: true,
                    pointStyle: 'circle'
                }
            },
            tooltip: {
                backgroundColor: 'rgba(0,0,0,0.8)',
                padding: 12,
                borderColor: '#fff',
                borderWidth: 1,
                titleFont: {
                    size: 14,
                    weight: 'bold'
                },
                bodyFont: {
                    size: 13
                },
                displayColors: true,
                callbacks: {
                    label: function(context) {
                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                        const percentage = ((context.parsed / total) * 100).toFixed(1);
                        return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                    }
                }
            }
        },
        animation: {
            animateRotate: true,
            animateScale: true,
            duration: 1500,
            easing: 'easeInOutQuart'
        }
    }
});

// Project Status Doughnut Chart with Enhanced Styling
const projectCtx = document.getElementById('projectChart').getContext('2d');
const projectChart = new Chart(projectCtx, {
    type: 'doughnut',
    data: {
        labels: ['Running Projects', 'Upcoming Projects'],
        datasets: [{
            data: [<?php echo $running_projects; ?>, <?php echo $upcoming_projects; ?>],
            backgroundColor: [
                createGradient(projectCtx, '#dc3545', '#c82333'),
                createGradient(projectCtx, '#28a745', '#218838')
            ],
            borderWidth: 4,
            borderColor: '#fff',
            hoverBorderWidth: 6,
            hoverBorderColor: '#fff',
            hoverOffset: 15
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '70%',
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    padding: 20,
                    font: {
                        size: 12,
                        weight: '500'
                    },
                    usePointStyle: true,
                    pointStyle: 'circle'
                }
            },
            tooltip: {
                backgroundColor: 'rgba(0,0,0,0.8)',
                padding: 12,
                borderColor: '#fff',
                borderWidth: 1,
                titleFont: {
                    size: 14,
                    weight: 'bold'
                },
                bodyFont: {
                    size: 13
                },
                displayColors: true,
                callbacks: {
                    label: function(context) {
                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                        const percentage = ((context.parsed / total) * 100).toFixed(1);
                        return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                    }
                }
            }
        },
        animation: {
            animateRotate: true,
            animateScale: true,
            duration: 1500,
            easing: 'easeInOutQuart'
        }
    },
    plugins: [{
        id: 'centerText',
        beforeDraw: function(chart) {
            const width = chart.width;
            const height = chart.height;
            const ctx = chart.ctx;
            ctx.restore();
            
            const total = chart.config.data.datasets[0].data.reduce((a, b) => a + b, 0);
            const fontSize = (height / 160).toFixed(2);
            ctx.font = "bold " + fontSize + "em Poppins";
            ctx.textBaseline = "middle";
            ctx.fillStyle = "#dc3545";
            
            const text = total.toString();
            const textX = Math.round((width - ctx.measureText(text).width) / 2);
            const textY = height / 2 - 10;
            
            ctx.fillText(text, textX, textY);
            
            ctx.font = (fontSize * 0.4) + "em Poppins";
            ctx.fillStyle = "#6c757d";
            const subText = "Total";
            const subTextX = Math.round((width - ctx.measureText(subText).width) / 2);
            ctx.fillText(subText, subTextX, textY + 25);
            
            ctx.save();
        }
    }]
});

// Monthly Overview Bar Chart with Enhanced Styling
const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
const monthlyChart = new Chart(monthlyCtx, {
    type: 'bar',
    data: {
        labels: ['Employees', 'Leaves', 'Projects', 'Loans'],
        datasets: [{
            label: 'Active/Approved',
            data: [<?php echo $active_employees; ?>, <?php echo $approved_leaves; ?>, <?php echo $running_projects; ?>, <?php echo $granted_loans; ?>],
            backgroundColor: createGradient(monthlyCtx, '#1976d2', '#1565c0'),
            borderColor: '#1976d2',
            borderWidth: 2,
            borderRadius: 8,
            borderSkipped: false,
            hoverBackgroundColor: '#1565c0'
        },
        {
            label: 'Inactive/Pending',
            data: [<?php echo $inactive_employees; ?>, <?php echo $pending_leaves; ?>, <?php echo $upcoming_projects; ?>, <?php echo $pending_loans; ?>],
            backgroundColor: createGradient(monthlyCtx, '#ffc107', '#e0a800'),
            borderColor: '#ffc107',
            borderWidth: 2,
            borderRadius: 8,
            borderSkipped: false,
            hoverBackgroundColor: '#e0a800'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        interaction: {
            mode: 'index',
            intersect: false
        },
        scales: {
            x: {
                grid: {
                    display: false
                },
                ticks: {
                    font: {
                        size: 12,
                        weight: '500'
                    },
                    color: '#495057'
                }
            },
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0, 0, 0, 0.05)',
                    drawBorder: false
                },
                ticks: {
                    stepSize: 1,
                    font: {
                        size: 12
                    },
                    color: '#6c757d',
                    padding: 10
                }
            }
        },
        plugins: {
            legend: {
                position: 'top',
                align: 'end',
                labels: {
                    padding: 20,
                    font: {
                        size: 12,
                        weight: '500'
                    },
                    usePointStyle: true,
                    pointStyle: 'circle',
                    boxWidth: 8,
                    boxHeight: 8
                }
            },
            tooltip: {
                backgroundColor: 'rgba(0,0,0,0.8)',
                padding: 12,
                borderColor: '#fff',
                borderWidth: 1,
                titleFont: {
                    size: 14,
                    weight: 'bold'
                },
                bodyFont: {
                    size: 13
                },
                displayColors: true,
                callbacks: {
                    title: function(context) {
                        return context[0].label + ' Statistics';
                    }
                }
            }
        },
        animation: {
            duration: 1500,
            easing: 'easeInOutQuart',
            delay: (context) => {
                let delay = 0;
                if (context.type === 'data' && context.mode === 'default') {
                    delay = context.dataIndex * 100 + context.datasetIndex * 50;
                }
                return delay;
            }
        }
    }
});

// To-Do functionality (keep existing)
$(".to-do").on("click", function(){
    $.ajax({
        url: "Update_Todo",
        type:"POST",
        data: {
            'toid': $(this).attr('data-id'),         
            'tovalue': $(this).attr('data-value'),
        },
        success: function(response) {
            location.reload();
        },
        error: function(response) {
            console.error();
        }
    });
});		
</script>                                               

<?php $this->load->view('backend/footer'); ?>
<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["Dashboard"]; ?> | Minia - Admin & Dashboard Template</title>

    <?php include 'layouts/head.php'; ?>

    <!-- FullCalendar CSS -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />

    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Attendance</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Minia</a></li>
                                    <li class="breadcrumb-item active">Attendance</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <!-- Employee Dropdown -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="employeeDropdown" class="form-label">Select Employee:</label>
                        <select class="form-select" id="employeeDropdown">
                            <!-- Replace the options with actual employee data -->
                            <option value="1">Employee 1</option>
                            <option value="2">Employee 2</option>
                            <option value="3">Employee 3</option>
                        </select>
                    </div>
                </div>

                <!-- FullCalendar container -->
                <div class="row">
                    <div class="col-md-12">
                        <div id="calendar"></div>
                    </div>
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- FullCalendar JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>

<!-- Your custom script to fetch and populate events -->
<script>
    $(document).ready(function () {
        // Initialize FullCalendar
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: function (start, end, timezone, callback) {
                var selectedEmployeeId = $('#employeeDropdown').val();
                fetchEmployeeAttendanceDetails(selectedEmployeeId, start.format(), end.format(), callback);
            },
            eventRender: function (event, element) {
                // Customize the rendering based on attendance status
                if (event.status === 'absent') {
                    element.css('background-color', 'red');
                } else if (event.status === 'half-day') {
                    element.css('background-color', 'yellow');
                } else {
                    element.css('background-color', 'green'); // Assuming 'P' means presented
                    element.append('<span class="fc-event-title">P</span>');
                }
            }
        });

        // Fetch and populate events dynamically from the backend
        function fetchEmployeeAttendanceDetails(employeeId, start, end, callback) {
            // Mock data for testing
            var mockData = [
                { title: 'Present', start: '2024-01-02', status: 'present' },
                { title: 'Half Day', start: '2024-01-06', status: 'half-day' },
                { title: 'Absent', start: '2024-01-08', status: 'absent' },
            ];

            // Parse the mock data and update the FullCalendar events
            var events = parseAttendanceData(mockData);
            callback(events);
        }

        // Parse the attendance data received from the backend
        function parseAttendanceData(data) {
            // Format the data into FullCalendar events array
            return data.map(function (attendance) {
                return {
                    title: attendance.title,
                    start: attendance.start,
                    status: attendance.status // Additional property for custom rendering
                };
            });
        }
    });
</script>

</body>

</html>

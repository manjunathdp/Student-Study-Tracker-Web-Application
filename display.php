<html>
<head>
    <style>
    <?php include 'table.css'; ?>
    </style>
</head>
<body>
    
<?php
include("connection.php");

// Query to fetch all data in ascending date order
$ret2 = "SELECT subject, DATE_FORMAT(date, '%d-%M-%Y  (%W)') as date, hours, topic FROM details ORDER BY date ASC";
$dbrt = mysqli_query($conn, $ret2);
?>

<table border="1px solid black">
    <tr>
        <th>SUBJECT</th>
        <th>DATE</th>
        <th>HOURS</th>
        <th>TOPIC</th>
    </tr>
    <?php
    $totalHrs = 0;
    while ($arr = mysqli_fetch_assoc($dbrt)) {
        $totalHrs += $arr['hours'];
    ?>
        <tr>
            <td><?php echo $arr['subject']; ?></td>
            <td><?php echo $arr['date']; ?></td>
            <td><?php echo $arr['hours']; ?></td>
            <td><?php echo $arr['topic']; ?></td>
        </tr>
    <?php
    }
    ?>
</table>

<h1>Total hours = <?php echo $totalHrs ?></h1>

<?php
// Fetch today's date and studied hours for today
$today = date('Y-m-d');
$daterev = "SELECT SUM(hours) as today FROM details WHERE date = '$today'";
$dbrt = mysqli_query($conn, $daterev);
$result = mysqli_fetch_assoc($dbrt);
?>
<h2>Today studied = <?php echo $result['today'] + 0; ?></h2>

<center><h1 style="background-color:powderblue;"><u><i>Top list of studied subjects</i></u></h1></center>
<table border="1px solid black" class="toptables">
    <tr>
        <th>SUBJECT</th>
        <th>HOURS</th>
    </tr>
    <?php
    $ret2 = "SELECT subject, SUM(hours) as hrs FROM details GROUP BY subject ORDER BY hrs DESC";
    $dbrt = mysqli_query($conn, $ret2);
    while ($arr = mysqli_fetch_assoc($dbrt)) {
    ?>
        <tr>
            <td><?php echo $arr['subject']; ?></td>
            <td><?php echo $arr['hrs']; ?></td>
        </tr>
    <?php
    }
    ?>
</table>

<center><h1 style="background-color:powderblue;"><u><i>List of hours studied in every month</i></u></h1></center>
<table border="1px solid black" class="toptables">
    <tr>
        <th>MONTH(YEAR)</th>
        <th>HOURS</th>
    </tr>
    <?php
    $ret2 = "SELECT DATE_FORMAT(date, '%M (%Y)') as month, SUM(hours) as hrs FROM details GROUP BY month ORDER BY date ASC";
    $dbrt = mysqli_query($conn, $ret2);
    while ($arr = mysqli_fetch_assoc($dbrt)) {
    ?>
        <tr>
            <td><?php echo $arr['month']; ?></td>
            <td><?php echo $arr['hrs']; ?></td>
        </tr>
    <?php
    }
    ?>
</table>

<!-- Weekly data handling -->
<?php
// Function to get the start of the week (Monday) and end of the week (Sunday)
function get_monday($date) {
    return date('Y-m-d', strtotime('Monday this week', strtotime($date)));
}

function get_sunday($date) {
    return date('Y-m-d', strtotime('Sunday this week', strtotime($date)));
}

// Function to get the date for a specific day within the week
function get_date_for_day($base_date, $day) {
    return date('Y-m-d', strtotime("$day this week", strtotime($base_date)));
}

// Function to format date as Month-Day (e.g., Sept-29)
function format_date($date) {
    return date('M-d', strtotime($date));
}

$today = date('Y-m-d');

// Get the current week (Monday to Sunday)
$current_week_start = get_monday($today);
$current_week_end = get_sunday($today);

// Get last week's Monday to Sunday
$last_week_start = get_monday(date('Y-m-d', strtotime('-1 week', strtotime($today))));
$last_week_end = get_sunday(date('Y-m-d', strtotime('-1 week', strtotime($today))));

// Query to get the data for the current week (Monday to Sunday)
$current_week_query = "
    SELECT subject, topic, hours, DATE_FORMAT(date, '%W') as day, date
    FROM details
    WHERE date BETWEEN '$current_week_start' AND '$current_week_end'
    ORDER BY date ASC
";
$current_week_result = mysqli_query($conn, $current_week_query);

// Query to get the data for last week (Monday to Sunday)
$last_week_query = "
    SELECT subject, topic, hours, DATE_FORMAT(date, '%W') as day, date
    FROM details
    WHERE date BETWEEN '$last_week_start' AND '$last_week_end'
    ORDER BY date ASC
";
$last_week_result = mysqli_query($conn, $last_week_query);
?>

<h2>Weekly Data</h2>

<h3>Current Week (<?php echo $current_week_start . " to " . $current_week_end; ?>)</h3>
<?php
$days_of_week = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
$current_week_data = [];
while ($row = mysqli_fetch_assoc($current_week_result)) {
    $current_week_data[date('l', strtotime($row['date']))][] = $row;
}

foreach ($days_of_week as $day) {
    $date_for_day = get_date_for_day($today, $day); // Get the actual date for the day
    echo "<h4>$day (" . format_date($date_for_day) . ")</h4>"; // Format it as 'Sept-29'
    echo "<table>
        <tr><th>Subject</th><th>Topic</th><th>Hours</th></tr>";
    if (isset($current_week_data[$day])) {
        foreach ($current_week_data[$day] as $data) {
            echo "<tr><td>{$data['subject']}</td><td>{$data['topic']}</td><td>{$data['hours']}</td></tr>";
        }
    } else {
        echo "<tr><td>No data</td><td>No data</td><td>No data</td></tr>";
    }
    echo "</table>";
}
?>

<h3>Last Week (<?php echo $last_week_start . " to " . $last_week_end; ?>)</h3>
<?php
$last_week_data = [];
while ($row = mysqli_fetch_assoc($last_week_result)) {
    $last_week_data[date('l', strtotime($row['date']))][] = $row;
}

foreach ($days_of_week as $day) {
    $date_for_day = get_date_for_day($last_week_start, $day); // Get the actual date for last week
    echo "<h4>$day (" . format_date($date_for_day) . ")</h4>"; // Format it as 'Sept-29'
    echo "<table>
        <tr><th>Subject</th><th>Topic</th><th>Hours</th></tr>";
    if (isset($last_week_data[$day])) {
        foreach ($last_week_data[$day] as $data) {
            echo "<tr><td>{$data['subject']}</td><td>{$data['topic']}</td><td>{$data['hours']}</td></tr>";
        }
    } else {
        echo "<tr><td>No data</td><td>No data</td><td>No data</td></tr>";
    }
    echo "</table>";
}
?>
</body>
</html>

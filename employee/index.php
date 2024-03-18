    <?php 
    session_start();

if (!isset($_SESSION['emp_id'])) {
    header("Location: emp-login.php");
    exit();
}

        $id = (isset($_GET['emp_id']) ? $_GET['emp_id'] : '');
        require_once ('vendor/inc/connection.php');
        $sql1 = "SELECT * FROM `employee` where emp_id = '$id'";
        $result1 = mysqli_query($conn, $sql1);
        $employeen = mysqli_fetch_array($result1);
        $empName = ($employeen['first_name']);

        $sql = "SELECT employee.emp_id, employee.first_name, employee.last_name, rank.points FROM employee, rank WHERE rank.emp_id = employee.emp_id ORDER BY rank.points DESC";

        $sql1 = "SELECT `project_name`, `due_date` FROM `project` WHERE emp_id = '$id' and status = 'Due'";

        $sql2 = "SELECT * From employee, employee_leave Where employee.emp_id = '$id' and employee_leave.emp_id = '$id' order by employee_leave.token";

        $sql3 = "SELECT * FROM `salary` WHERE emp_id = '$id'";

    //echo "$sql";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);
    $result3 = mysqli_query($conn, $sql3);
    ?>



    <html>
        <?php include('vendor/inc/head.php') ?>
        <style>
            body {
    margin: 0;
    padding: 0;
    font-family: 'Montserrat', sans-serif;
    background-color: #f5f5f5;
}


        </style>
    <body>
        <?php include('vendor/inc/nav.php')  ?>
        <div class="divider"></div>
        <div class="contain">
        <div>
            <!-- <h2>Welcome <?php echo "$empName"; ?> </h2> -->

                    <h2 class ="h2">Empolyee Leaderboard </h2>
            <table>

                <tr>
                    <th align = "center">Seq.</th>
                    <th align = "center">Emp. ID</th>
                    <th align = "center">Name</th>
                    <th align = "center">Points</th>
                    

                </tr>

                

                <?php
                    $seq = 1;
                    while ($employee = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$seq."</td>";
                        echo "<td>".$employee['emp_id']."</td>";
                        
                        echo "<td>".$employee['first_name']." ".$employee['last_name']."</td>";
                        
                        echo "<td>".$employee['points']."</td>";
                        
                        $seq+=1;
                    }


                ?>

            </table>
    
            <h2 class = "h2">Due Projects</h2>
            

            <table>

                <tr>
                    <th align = "center">Project Name</th>
                    <th align = "center">Due Date</th>
                    
                </tr>

                

                <?php
                    while ($employee1 = mysqli_fetch_assoc($result1)) {
                        echo "<tr>";
                        
                        echo "<td>".$employee1['project_name']."</td>";
                        
                        echo "<td>".$employee1['due_date']."</td>";

                    }


                ?>

            </table>



            <h2 class = "h2">Salary Status</h2>
            

            <table>

                <tr>
                    
                    <th align = "center">Base Salary</th>
                    <th align = "center">Bonus</th>
                    <th align = "center">Total Salary</th>
                    
                </tr>

                

                <?php
                    while ($employee3 = mysqli_fetch_assoc($result3)) {
                        echo "<tr>";
                        echo "<td>".$employee3['salary']."</td>"; // Update to use the correct column name
                        echo "<td>".$employee3['bonus']." %</td>"; // Update to use the correct column name
                        echo "<td>".$employee3['salary']."</td>"; // Update to use the correct column name
                    }


                    


                ?>

            </table>










            <h2 class ="h2">Leave Satus</h2>
            

            <table>

                <tr>
                    
                    <th align = "center">Start Date</th>
                    <th align = "center">End Date</th>
                    <th align = "center">Total Days</th>
                    <th align = "center">Reason</th>
                    <th align = "center">Status</th>
                </tr>

                

                <?php
                    while ($employee2 = mysqli_fetch_assoc($result2)) {
                        $date1 = new DateTime($employee2['start_date']);
                        $date2 = new DateTime($employee2['end_date']);
                        $interval = $date1->diff($date2);
                    
                        echo "<tr>";
                        echo "<td>".$employee2['start_date']."</td>"; // Update to use the correct column name
                        echo "<td>".$employee2['end_date']."</td>"; // Update to use the correct column name
                        echo "<td>".$interval->days."</td>";
                        echo "<td>".$employee2['reason']."</td>";
                        echo "<td>".$employee2['status']."</td>";
                    }


                    


                ?>

            </table>




    
    <br>
    <br>
    <br>
    <br>
    <br>







        </div>


            </h2>


            
            
        </div>
    </body>
    </html>
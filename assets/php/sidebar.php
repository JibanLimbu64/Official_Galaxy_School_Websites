<?php

function get_sidebar($activePage = 'home', $baseurl = ""): void {
    function isActive($page, $activePage) {
        return $page === $activePage ? ' active' : '';
    }
    ?>
    <!-- Sidebar -->
    <div class="sidebar w-250">
        <div class="admin-profile">
            <img src="<?php echo $baseurl ?>/images/logo.png" alt="Admin Photo">
            <h5>GalaxyAcademy</h5>
            <p class="text-muted">School Administrator</p>
        </div>
        <nav class="nav flex-column p-3">
            <a href="dashboard.php" class="nav-link<?php echo isActive('dashboard', $activePage); ?>">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="newstudent.php" class="nav-link<?php echo isActive('students', $activePage); ?>">
                <i class="fas fa-users"></i> Students
            </a>
            <a href="teachers.php" class="nav-link<?php echo isActive('teachers', $activePage); ?>">
                <i class="fas fa-chalkboard-teacher"></i> Teachers
            </a>
            <a href="course.php" class="nav-link<?php echo isActive('courses', $activePage); ?>">
                <i class="fas fa-book"></i> Courses
            </a>
            <a href="schedule.php" class="nav-link<?php echo isActive('schedule', $activePage); ?>">
                <i class="fas fa-calendar-alt"></i> Schedule
            </a>
            <a href="fees.php" class="nav-link<?php echo isActive('fees', $activePage); ?>">
                <i class="fas fa-file-invoice-dollar"></i> Fees
            </a>
            <a href="messages.php" class="nav-link<?php echo isActive('messages', $activePage); ?>">
                <i class="fas fa-envelope"></i> Messages
            </a>
            <a href="settings.php" class="nav-link<?php echo isActive('settings', $activePage); ?>">
                <i class="fas fa-cog"></i> Settings
            </a>
            <a href="../authentication/Login.php" class="nav-link">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </nav>
    </div>
    <?php
}

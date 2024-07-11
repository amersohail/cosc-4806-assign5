<?php require_once 'app/views/templates/header.php';?>

<!-- Include Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-md-6">
                <h2>Total logins by user</h2>
                <?php if (isset($data['logins']) && !empty($data['logins'])): ?>
                    <?php
                    // Prepare data for report.js
                    $loginLabels = [];
                    $loginCounts = [];
                    foreach ($data['logins'] as $login) {
                        $loginLabels[] = htmlspecialchars($login['username']);
                        $loginCounts[] = (int) htmlspecialchars($login['login_count']);
                    }
                    ?>
                    <canvas id="loginChart" width="400" height="200"
                            data-labels='<?= json_encode($loginLabels) ?>'
                            data-data='<?= json_encode($loginCounts) ?>'>
                    </canvas>
                <?php else: ?>
                    <p>No login attempts data available.</p>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <h2>Total reminders by user</h2>
                <?php if (isset($data['reminders']) && !empty($data['reminders'])): ?>
                    <?php
                    // Prepare data for report.js
                    $reminderLabels = [];
                    $reminderCounts = [];
                    foreach ($data['reminders'] as $reminder) {
                        $reminderLabels[] = htmlspecialchars($reminder['username']);
                        $reminderCounts[] = (int) htmlspecialchars($reminder['note_count']);
                    }
                    ?>
                    <canvas id="reminderChart" width="400" height="200"
                            data-labels='<?= json_encode($reminderLabels) ?>'
                            data-data='<?= json_encode($reminderCounts) ?>'>
                    </canvas>
                <?php else: ?>
                    <p>No reminders data available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script src="/app/script/report.js" type="text/javascript"></script>

<?php require_once 'app/views/templates/footer.php'; ?>
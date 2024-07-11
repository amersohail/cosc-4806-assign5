<?php require_once 'app/views/templates/header.php';?>

<!-- Include Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-primary text-center" role="alert">
                    <h1 class="display-4 report-font-size">Admin Reports</h1>
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-secondary text-center" role="alert">
                    <h2>Total logins by user</h2>
                </div>
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
                <hr class="my-4">
                <?php if (isset($data['logins_status']) && !empty($data['logins_status'])): ?>
                    <?php
                    // Prepare data for Chart.js
                    $statusLabels = [];
                    $statusCounts = [];
                    foreach ($data['logins_status'] as $status) {
                        $statusLabels[] = htmlspecialchars($status['attempt']);
                        $statusCounts[] = (int) htmlspecialchars($status['count']);
                    }
                    ?>
                    <div class="piePadd">
                        <canvas id="statusChart"
                                data-labels='<?= json_encode($statusLabels) ?>'
                                data-data='<?= json_encode($statusCounts) ?>'>
                        </canvas>
                    </div>
                <?php else: ?>
                    <p>No login status data available.</p>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <div class="alert alert-secondary text-center" role="alert">
                    <h2>Total reminders by user</h2>
                </div>
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
                
                <hr class="my-4">

                <button type="button" class="btn btn-primary mt-3 buttonMargin" data-bs-toggle="modal" data-bs-target="#remindersModal">
                    Click to see all reminders
                </button>
                
                <!-- Toast Container -->
                <div aria-live="polite" aria-atomic="true" class="position-relative">
                    <div class="toast-container position-absolute top-0 end-0 p-3 w-100">
                        <div id="topUserToast" class="toast w-100" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <strong class="me-auto">Most Reminders</strong>
                                <small>Just now</small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                <?php if (isset($data['topUser'])): ?>
                                    <?= htmlspecialchars($data['topUser']['username']) ?> has the most reminders with a total of <?= $data['topUser']['note_count'] ?> reminders.
                                <?php else: ?>
                                    No reminder data available.
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
              
                <!-- Modal -->
                <div class="modal fade" id="remindersModal" tabindex="-1" aria-labelledby="remindersModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="remindersModalLabel">All Reminders</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Subject</th>
                                            <th>Created At</th>
                                            <th>Completed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['reminders'] as $reminder): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($reminder['username']); ?></td>
                                                <td><?= htmlspecialchars($reminder['subject']); ?></td>
                                                <td><?= htmlspecialchars($reminder['created_at']); ?></td>
                                                <td><?= $reminder['completed'] ? 'Yes' : 'No'; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/app/script/report.js" type="text/javascript"></script>

<?php require_once 'app/views/templates/footer.php'; ?>
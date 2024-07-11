<?php require_once 'app/views/templates/header.php';?>

<!-- Include Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Admin Reports</h1>
                <p class="lead">This page shows the admin reports.</p>

                <h2>Total logins by user</h2>
                <?php if (isset($data['logins']) && !empty($data['logins'])): ?>
                    <?php
                    // Prepare data for Chart.js
                    $labels = [];
                    $loginCounts = [];
                    foreach ($data['logins'] as $login) {
                        $labels[] = htmlspecialchars($login['username']);
                        $loginCounts[] = htmlspecialchars($login['login_count']);
                    }
                    ?>
                    <canvas id="loginChart" width="400" height="200"
                            data-labels='<?= json_encode($labels) ?>'
                            data-data='<?= json_encode($loginCounts) ?>'>
                    </canvas>
                <?php else: ?>
                    <p>No login attempts data available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<script src="/app/script/report.js" type="text/javascript"></script>

<?php require_once 'app/views/templates/footer.php'; ?>x
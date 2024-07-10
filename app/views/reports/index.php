<?php require_once 'app/views/templates/header.php';
?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>You are at a secret page</h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Admin Reports</h1>
                <p class="lead">This page shows the admin reports.</p>

                <h2>Login Attempts</h2>
                <?php if (isset($data['logins'])): ?>
                    <pre><?php print_r($data['logins']); ?></pre>
                <?php else: ?>
                    <p>Login attempts data not received.</p>
                <?php endif; ?>

                <h2>Reminders</h2>
                <?php if (isset($data['reminders'])): ?>
                    <pre><?php print_r($data['reminders']); ?></pre>
                <?php else: ?>
                    <p>Reminders data not received.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<?php require_once 'app/views/templates/footer.php'; ?>